<?php

namespace App\Http\Middleware;

use App\Models\VisitorLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class LogAllVisitors
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get user agent
        $userAgent = $request->userAgent() ?? 'Unknown';
        
        // Initialize Agent library for better browser/platform detection
        $agent = new Agent();
        $agent->setUserAgent($userAgent);
        
        // Determine visitor type and username
        $visitorData = $this->identifyVisitor($request, $agent, $userAgent);
        
        // Create visitor log entry
        try {
            VisitorLog::create([
                'user_id' => auth()->id(),
                'username' => $visitorData['username'],
                'visitor_type' => $visitorData['type'],
                'ip_address' => $request->ip(),
                'user_agent' => $userAgent,
                'page_url' => $request->fullUrl(),
                'browser' => $agent->browser(),
                'platform' => $agent->platform(),
                'is_mobile' => $agent->isMobile(),
                'is_tablet' => $agent->isTablet(),
                'is_desktop' => $agent->isDesktop(),
                'device' => $agent->device(),
                'connected_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Log error but don't break the request
            \Log::error('Failed to log visitor: ' . $e->getMessage());
        }
        
        return $next($request);
    }
    
    /**
     * Identify visitor type and assign appropriate username
     */
    private function identifyVisitor(Request $request, Agent $agent, string $userAgent): array
    {
        // Check if user is authenticated
        if (auth()->check()) {
            return [
                'type' => 'user',
                'username' => auth()->user()->name ?? auth()->user()->email
            ];
        }
        
        // Check if it's a bot
        if ($this->isBot($userAgent, $agent)) {
            return [
                'type' => 'bot',
                'username' => $this->extractBotName($userAgent)
            ];
        }
        
        // Anonymous visitor
        return [
            'type' => 'anonymous',
            'username' => $this->generateAnonymousId($request)
        ];
    }
    
    /**
     * Check if the user agent is a bot
     */
    private function isBot(string $userAgent, Agent $agent): bool
    {
        // Use Agent library's built-in bot detection
        if ($agent->isRobot()) {
            return true;
        }
        
        // Additional bot detection patterns
        $botPatterns = [
            'bot', 'crawl', 'slurp', 'spider', 'mediapartners',
            'adsbot', 'googlebot', 'bingbot', 'yahoo', 'baiduspider',
            'facebookexternalhit', 'twitterbot', 'rogerbot', 'linkedinbot',
            'embedly', 'quora link preview', 'showyoubot', 'outbrain',
            'pinterest', 'developers.google.com/+/web/snippet',
            'slackbot', 'vkshare', 'w3c_validator', 'redditbot',
            'applebot', 'whatsapp', 'flipboard', 'tumblr', 'bitlybot',
            'skypeuripreview', 'nuzzel', 'discordbot', 'google page speed',
            'qwantify', 'pinterestbot', 'bitrix link preview', 'xing-contenttabreceiver',
            'chrome-lighthouse', 'telegrambot', 'yandexbot', 'duckduckbot',
            'ia_archiver', 'screaming frog', 'semrushbot', 'ahrefsbot',
            'dotbot', 'mj12bot', 'blexbot', 'petalbot'
        ];
        
        $lowerUserAgent = strtolower($userAgent);
        
        foreach ($botPatterns as $pattern) {
            if (str_contains($lowerUserAgent, $pattern)) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Extract bot name from user agent
     */
    private function extractBotName(string $userAgent): string
    {
        // Common bot patterns with their friendly names
        $botMappings = [
            // Search Engine Bots
            'googlebot' => 'Googlebot',
            'google-inspectiontool' => 'Google Inspection Tool',
            'adsbot-google' => 'Google AdsBot',
            'mediapartners-google' => 'Google AdSense',
            'apis-google' => 'Google APIs',
            'google page speed' => 'Google PageSpeed',
            'chrome-lighthouse' => 'Google Lighthouse',
            'bingbot' => 'Bingbot',
            'msnbot' => 'MSN Bot',
            'slurp' => 'Yahoo! Slurp',
            'yahoo' => 'Yahoo Bot',
            'duckduckbot' => 'DuckDuckBot',
            'baiduspider' => 'Baidu Spider',
            'yandexbot' => 'YandexBot',
            'sogou' => 'Sogou Spider',
            'exabot' => 'Exabot',
            'applebot' => 'AppleBot',
            
            // Social Media Bots
            'facebookexternalhit' => 'Facebook Bot',
            'facebot' => 'Facebook Bot',
            'twitterbot' => 'Twitter Bot',
            'linkedinbot' => 'LinkedIn Bot',
            'pinterestbot' => 'Pinterest Bot',
            'slackbot' => 'Slack Bot',
            'telegrambot' => 'Telegram Bot',
            'whatsapp' => 'WhatsApp Bot',
            'discordbot' => 'Discord Bot',
            'skypeuripreview' => 'Skype Preview',
            'vkshare' => 'VK Share',
            'redditbot' => 'Reddit Bot',
            'tumblr' => 'Tumblr Bot',
            
            // SEO & Analytics Bots
            'semrushbot' => 'SEMrush Bot',
            'ahrefsbot' => 'Ahrefs Bot',
            'mj12bot' => 'Majestic Bot',
            'rogerbot' => 'Moz Bot',
            'dotbot' => 'OpenSiteExplorer',
            'screaming frog' => 'Screaming Frog',
            'blexbot' => 'BLEXBot',
            'petalbot' => 'PetalBot',
            
            // Content Aggregators
            'embedly' => 'Embedly',
            'flipboard' => 'Flipboard',
            'outbrain' => 'Outbrain',
            'nuzzel' => 'Nuzzel',
            'bitlybot' => 'Bitly Bot',
            'qwantify' => 'Qwantify',
            
            // Validators & Tools
            'w3c_validator' => 'W3C Validator',
            'validator.nu' => 'HTML5 Validator',
            'ia_archiver' => 'Internet Archive',
            
            // Generic
            'spider' => 'Web Spider',
            'crawler' => 'Web Crawler',
            'bot' => 'Bot',
        ];
        
        $lowerUserAgent = strtolower($userAgent);
        
        // Check for known bot patterns
        foreach ($botMappings as $pattern => $name) {
            if (str_contains($lowerUserAgent, $pattern)) {
                // Try to extract version if available
                if (preg_match('/' . preg_quote($pattern, '/') . '[\/\s]?([\d\.]+)?/i', $userAgent, $matches)) {
                    $version = isset($matches[1]) && !empty($matches[1]) ? ' ' . $matches[1] : '';
                    return $name . $version;
                }
                return $name;
            }
        }
        
        // Try to extract bot name from common patterns
        // Pattern: BotName/Version
        if (preg_match('/([A-Za-z0-9\-]+)bot[\/\s]?([\d\.]+)?/i', $userAgent, $matches)) {
            $botName = ucfirst($matches[1]) . 'bot';
            $version = isset($matches[2]) && !empty($matches[2]) ? ' ' . $matches[2] : '';
            return $botName . $version;
        }
        
        // Pattern: BotName Spider/Version
        if (preg_match('/([A-Za-z0-9\-]+)\s*spider/i', $userAgent, $matches)) {
            return ucfirst($matches[1]) . ' Spider';
        }
        
        // Pattern: BotName Crawler
        if (preg_match('/([A-Za-z0-9\-]+)\s*crawler/i', $userAgent, $matches)) {
            return ucfirst($matches[1]) . ' Crawler';
        }
        
        // If we can't identify it, return a truncated user agent
        $truncated = Str::limit($userAgent, 30, '...');
        return 'Unknown Bot (' . $truncated . ')';
    }
    
    /**
     * Generate anonymous ID based on IP and user agent
     */
    private function generateAnonymousId(Request $request): string
    {
        $hash = md5($request->ip() . $request->userAgent());
        return 'anonymous_' . substr($hash, 0, 8);
    }
}
