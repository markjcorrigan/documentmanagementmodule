# Laravel Policies - Complete Guide

## What Are Policies?

Policies are classes that organize authorization logic around a particular model or resource. They determine whether a user can perform actions like view, create, update, or delete a specific resource.

### The Problem They Solve

```php
// Without Policies - authorization logic scattered everywhere
public function update(Request $request, Post $post)
{
    // Check in controller
    if (auth()->id() !== $post->user_id && !auth()->user()->isAdmin()) {
        abort(403);
    }
    
    $post->update($request->all());
}

public function edit(Post $post)
{
    // Check again in another method
    if (auth()->id() !== $post->user_id && !auth()->user()->isAdmin()) {
        abort(403);
    }
    
    return view('posts.edit', compact('post'));
}
```

```php
// With Policies - centralized authorization
public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);
    
    $post->update($request->all());
}

public function edit(Post $post)
{
    $this->authorize('update', $post);
    
    return view('posts.edit', compact('post'));
}
```

### Why Use Policies?

- **Centralized Logic**: All authorization in one place
- **Reusability**: Use same checks everywhere
- **Consistency**: Same rules applied consistently
- **Testability**: Easy to test authorization
- **Readability**: Clear authorization rules
- **Maintainability**: Update rules in one place
- **Separation of Concerns**: Keep controllers clean

### Common Use Cases

- Check if user owns a resource
- Check if user is admin
- Verify user subscription status
- Check resource visibility
- Enforce role-based permissions
- Verify account status
- Check team membership
- Validate access levels

## File Locations

```
app/Policies/PostPolicy.php
app/Policies/CommentPolicy.php
app/Policies/OrderPolicy.php
app/Providers/AuthServiceProvider.php    (Register policies)
```

## Creating Policies

### Generate Policy

```bash
# Create policy
php artisan make:policy PostPolicy

# Create policy for model
php artisan make:policy PostPolicy --model=Post
```

This creates: `app/Policies/PostPolicy.php`

### Basic Policy Structure

```php
<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}
```

## Registering Policies

### Auto-Discovery

Laravel automatically discovers policies if they follow the naming convention:
- Model: `App\Models\Post`
- Policy: `App\Policies\PostPolicy`

### Manual Registration

If not following convention, register in `AuthServiceProvider`:

```php
<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
```

## Policy Methods

### Standard CRUD Methods

```php
viewAny()      // Can user view a list?
view()         // Can user view this specific resource?
create()       // Can user create new resources?
update()       // Can user update this resource?
delete()       // Can user delete this resource?
restore()      // Can user restore this soft-deleted resource?
forceDelete()  // Can user permanently delete this resource?
```

### Custom Methods

```php
public function publish(User $user, Post $post): bool
{
    return $user->id === $post->user_id && $post->status === 'draft';
}

public function archive(User $user, Post $post): bool
{
    return $user->isAdmin() || $user->id === $post->user_id;
}
```

## Using Policies

### In Controllers

#### Using authorize() Method

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function update(Request $request, Post $post)
    {
        // Authorize - throws 403 if fails
        $this->authorize('update', $post);
        
        $post->update($request->validated());
        
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();
        
        return redirect()->route('posts.index');
    }
}
```

#### Using Gate Facade

```php
use Illuminate\Support\Facades\Gate;

public function update(Request $request, Post $post)
{
    if (Gate::denies('update', $post)) {
        abort(403);
    }
    
    // Or check if allowed
    if (Gate::allows('update', $post)) {
        $post->update($request->validated());
    }
}
```

#### Using User Model

```php
public function update(Request $request, Post $post)
{
    if (!auth()->user()->can('update', $post)) {
        abort(403);
    }
    
    $post->update($request->validated());
}

// Or check cannot
if (auth()->user()->cannot('update', $post)) {
    abort(403);
}
```

#### Authorizing Before Entire Controller

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        // Authorize all actions
        $this->authorizeResource(Post::class, 'post');
    }

    // No need for $this->authorize() in methods now
    public function update(Request $request, Post $post)
    {
        $post->update($request->validated());
    }
}
```

### In Blade Views

```blade
{{-- Check if user can update post --}}
@can('update', $post)
    <a href="{{ route('posts.edit', $post) }}">Edit</a>
@endcan

{{-- Check if user cannot delete post --}}
@cannot('delete', $post)
    <p>You cannot delete this post</p>
@endcannot

{{-- Else clause --}}
@can('update', $post)
    <a href="{{ route('posts.edit', $post) }}">Edit</a>
@else
    <span>You cannot edit this post</span>
@endcan

{{-- Check multiple abilities --}}
@canany(['update', 'delete'], $post)
    <div class="post-actions">
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
        @endcan
        
        @can('delete', $post)
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
    </div>
@endcanany
```

### In Routes

```php
// Authorize in route definition
Route::put('/posts/{post}', [PostController::class, 'update'])
    ->middleware('can:update,post');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->middleware('can:delete,post');

// Multiple abilities
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('can:update,post');
```

### In Middleware

```php
// Use 'can' middleware in route groups
Route::middleware(['auth', 'can:update,post'])->group(function () {
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
});
```

## Policy Filters

Policy filters run before all other policy methods and can override them.

### Before Method (Super Admin)

```php
<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        // Admin can do everything
        if ($user->isAdmin()) {
            return true;
        }
        
        // Return null to continue to other methods
        return null;
    }

    public function update(User $user, Post $post): bool
    {
        // This won't be checked for admins (before returns true)
        return $user->id === $post->user_id;
    }
}
```

### After Method

```php
public function after(User $user, string $ability, bool $result): ?bool
{
    // Log all authorization checks
    \Log::info('Authorization check', [
        'user' => $user->id,
        'ability' => $ability,
        'result' => $result,
    ]);
    
    // Return null to not override the result
    return null;
}
```

## Guest Users

By default, policies don't run for guests. To allow guest checks:

### Make User Parameter Nullable

```php
public function view(?User $user, Post $post): bool
{
    // Allow anyone to view published posts
    if ($post->is_published) {
        return true;
    }
    
    // Only owner can view unpublished posts
    return $user && $user->id === $post->user_id;
}
```

### Using Optional Type Hint

```php
use Illuminate\Auth\Access\Response;

public function view(?User $user, Post $post): Response
{
    if ($post->is_published) {
        return Response::allow();
    }
    
    if (!$user) {
        return Response::deny('You must be logged in to view this post.');
    }
    
    if ($user->id === $post->user_id) {
        return Response::allow();
    }
    
    return Response::deny('This post is not published.');
}
```

## Response Objects

Return Response objects for more control over authorization messages.

### Basic Response

```php
use Illuminate\Auth\Access\Response;

public function update(User $user, Post $post): Response
{
    return $user->id === $post->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
}
```

### Conditional Response

```php
public function delete(User $user, Post $post): Response
{
    if ($post->hasComments()) {
        return Response::deny('Cannot delete posts with comments.');
    }
    
    return $user->id === $post->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
}
```

### Response with HTTP Status

```php
public function update(User $user, Post $post): Response
{
    if ($user->id !== $post->user_id) {
        return Response::deny('You do not own this post.', 403);
    }
    
    if ($post->is_locked) {
        return Response::deny('This post is locked.', 423);
    }
    
    return Response::allow();
}
```

## Complete Working Examples

### Example 1: Blog Post Policy

#### Policy

```php
<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        // Admins can do anything
        if ($user->role === 'admin') {
            return true;
        }
        
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        // Anyone can view list of posts
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Post $post): bool
    {
        // Anyone can view published posts
        if ($post->is_published) {
            return true;
        }
        
        // Only owner can view unpublished posts
        return $user && $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Any authenticated user can create posts
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        if ($user->id !== $post->user_id) {
            return Response::deny('You do not own this post.');
        }
        
        if ($post->is_locked) {
            return Response::deny('This post is locked and cannot be edited.');
        }
        
        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        if ($user->id !== $post->user_id) {
            return Response::deny('You do not own this post.');
        }
        
        if ($post->comments()->count() > 0) {
            return Response::deny('Cannot delete posts with comments.');
        }
        
        return Response::allow();
    }

    /**
     * Determine whether the user can publish the model.
     */
    public function publish(User $user, Post $post): bool
    {
        return $user->id === $post->user_id && $post->status === 'draft';
    }

    /**
     * Determine whether the user can unpublish the model.
     */
    public function unpublish(User $user, Post $post): bool
    {
        return $user->id === $post->user_id && $post->is_published;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // Only admins can permanently delete
        return $user->role === 'admin';
    }
}
```

#### Controller

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        // viewAny policy checked automatically
        $posts = Post::published()->latest()->paginate(20);
        
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // view policy checked automatically
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        // create policy checked automatically
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        // create policy checked automatically
        $post = auth()->user()->posts()->create($request->validated());
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        // update policy checked automatically
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // update policy checked automatically
        $post->update($request->validated());
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // delete policy checked automatically
        $post->delete();
        
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }

    public function publish(Post $post)
    {
        $this->authorize('publish', $post);
        
        $post->update([
            'is_published' => true,
            'published_at' => now(),
        ]);
        
        return back()->with('success', 'Post published successfully!');
    }
}
```

#### Blade View

```blade
<!-- resources/views/posts/show.blade.php -->
<div class="post">
    <h1>{{ $post->title }}</h1>
    
    <p>{{ $post->content }}</p>
    
    <div class="post-actions">
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                Edit Post
            </a>
        @endcan
        
        @can('publish', $post)
            <form method="POST" action="{{ route('posts.publish', $post) }}">
                @csrf
                <button type="submit" class="btn btn-success">Publish</button>
            </form>
        @endcan
        
        @can('delete', $post)
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Are you sure?')">
                    Delete Post
                </button>
            </form>
        @endcan
    </div>
</div>
```

### Example 2: Comment Policy

#### Policy

```php
<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Comment $comment): bool
    {
        // Can view if post is published
        return $comment->post->is_published;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Any authenticated user can comment
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): bool
    {
        // Can only edit own comments, within 30 minutes
        return $user->id === $comment->user_id 
            && $comment->created_at->diffInMinutes(now()) < 30;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        // Owner or post author can delete
        return $user->id === $comment->user_id 
            || $user->id === $comment->post->user_id;
    }

    /**
     * Determine whether the user can report the model.
     */
    public function report(User $user, Comment $comment): bool
    {
        // Cannot report own comments
        return $user->id !== $comment->user_id;
    }
}
```

### Example 3: Order Policy (E-commerce)

#### Policy

```php
<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Users can view their own orders
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Order $order): bool
    {
        // Can view own orders only
        return $user->id === $order->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Authenticated users can place orders
        return $user->hasVerifiedEmail();
    }

    /**
     * Determine whether the user can cancel the model.
     */
    public function cancel(User $user, Order $order): Response
    {
        if ($user->id !== $order->user_id) {
            return Response::deny('You do not own this order.');
        }
        
        if ($order->status === 'shipped') {
            return Response::deny('Cannot cancel orders that have shipped.');
        }
        
        if ($order->status === 'delivered') {
            return Response::deny('Cannot cancel delivered orders.');
        }
        
        return Response::allow();
    }

    /**
     * Determine whether the user can request a refund.
     */
    public function refund(User $user, Order $order): Response
    {
        if ($user->id !== $order->user_id) {
            return Response::deny('You do not own this order.');
        }
        
        if ($order->status !== 'delivered') {
            return Response::deny('Can only refund delivered orders.');
        }
        
        if ($order->delivered_at->diffInDays(now()) > 30) {
            return Response::deny('Refund period has expired (30 days).');
        }
        
        return Response::allow();
    }

    /**
     * Determine whether the user can download invoice.
     */
    public function downloadInvoice(User $user, Order $order): bool
    {
        return $user->id === $order->user_id && $order->status === 'completed';
    }
}
```

### Example 4: Team/Organization Policy

#### Policy

```php
<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Team $team): bool
    {
        // Member or public team
        return $user->belongsToTeam($team) || $team->is_public;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Any user can create a team
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Team $team): bool
    {
        // Only team owner can update
        return $user->id === $team->owner_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Team $team): bool
    {
        // Only owner can delete
        return $user->id === $team->owner_id;
    }

    /**
     * Determine whether the user can add members.
     */
    public function addMember(User $user, Team $team): bool
    {
        // Owner or admin can add members
        return $user->id === $team->owner_id 
            || $team->userIsAdmin($user);
    }

    /**
     * Determine whether the user can remove members.
     */
    public function removeMember(User $user, Team $team, User $member): Response
    {
        // Cannot remove owner
        if ($member->id === $team->owner_id) {
            return Response::deny('Cannot remove team owner.');
        }
        
        // Owner or admin can remove
        if ($user->id === $team->owner_id || $team->userIsAdmin($user)) {
            return Response::allow();
        }
        
        return Response::deny('You do not have permission to remove members.');
    }

    /**
     * Determine whether the user can leave the team.
     */
    public function leave(User $user, Team $team): Response
    {
        if ($user->id === $team->owner_id) {
            return Response::deny('Owner cannot leave. Transfer ownership or delete the team.');
        }
        
        if (!$user->belongsToTeam($team)) {
            return Response::deny('You are not a member of this team.');
        }
        
        return Response::allow();
    }
}
```

### Example 5: Subscription-Based Access

#### Policy

```php
<?php

namespace App\Policies;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeaturePolicy
{
    /**
     * Determine whether the user can access the feature.
     */
    public function access(User $user, Feature $feature): Response
    {
        // Free features
        if ($feature->is_free) {
            return Response::allow();
        }
        
        // Check subscription
        if (!$user->hasActiveSubscription()) {
            return Response::deny('You need an active subscription to access this feature.');
        }
        
        // Check subscription tier
        if ($feature->required_tier > $user->subscription->tier) {
            return Response::deny("This feature requires a {$feature->required_tier_name} subscription.");
        }
        
        // Check feature limits
        if ($feature->has_usage_limit) {
            $usage = $user->getFeatureUsage($feature);
            $limit = $user->subscription->getFeatureLimit($feature);
            
            if ($usage >= $limit) {
                return Response::deny("You have reached your monthly limit for this feature.");
            }
        }
        
        return Response::allow();
    }
}
```

## Testing Policies

### Test Policy Methods

```php
<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_own_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        
        $policy = new PostPolicy();
        
        $this->assertTrue($policy->update($user, $post));
    }

    public function test_user_cannot_update_others_post()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $otherUser->id]);
        
        $policy = new PostPolicy();
        
        $this->assertFalse($policy->update($user, $post));
    }

    public function test_admin_can_update_any_post()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $post = Post::factory()->create();
        
        $policy = new PostPolicy();
        
        $this->assertTrue($policy->update($admin, $post));
    }

    public function test_guest_can_view_published_post()
    {
        $post = Post::factory()->create(['is_published' => true]);
        
        $policy = new PostPolicy();
        
        $this->assertTrue($policy->view(null, $post));
    }

    public function test_guest_cannot_view_unpublished_post()
    {
        $post = Post::factory()->create(['is_published' => false]);
        
        $policy = new PostPolicy();
        
        $this->assertFalse($policy->view(null, $post));
    }
}
```

### Test Authorization in Feature Tests

```php
<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_edit_own_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('posts.edit', $post));

        $response->assertStatus(200);
    }

    public function test_user_cannot_edit_others_post()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)
            ->get(route('posts.edit', $post));

        $response->assertStatus(403);
    }

    public function test_user_cannot_delete_post_with_comments()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $post->comments()->create([
            'user_id' => User::factory()->create()->id,
            'body' => 'Test comment',
        ]);

        $response = $this->actingAs($user)
            ->delete(route('posts.destroy', $post));

        $response->assertStatus(403);
        $this->assertDatabaseHas('posts', ['id' => $post->id]);
    }
}
```

### Test Response Messages

```php
public function test_policy_returns_correct_error_message()
{
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => User::factory()->create()->id]);

    $response = $this->actingAs($user)
        ->put(route('posts.update', $post), [
            'title' => 'Updated Title',
        ]);

    $response->assertStatus(403);
    $response->assertSee('You do not own this post');
}
```

## Best Practices

### 1. Use Descriptive Method Names

```php
// Good - clear purpose
public function publish(User $user, Post $post): bool
public function archive(User $user, Post $post): bool
public function addMember(User $user, Team $team): bool

// Bad - unclear
public function action1(User $user, Post $post): bool
public function check(User $user, Post $post): bool
```

### 2. Use Response Objects for Messages

```php
// Good - helpful message
public function delete(User $user, Post $post): Response
{
    if ($post->hasComments()) {
        return Response::deny('Cannot delete posts with comments.');
    }
    
    return Response::allow();
}

// Bad - no message
public function delete(User $user, Post $post): bool
{
    return !$post->hasComments();
}
```

### 3. Use before() for Global Rules

```php
// Good - admin bypass in before()
public function before(User $user, string $ability): ?bool
{
    if ($user->isAdmin()) {
        return true;
    }
    
    return null;
}

// Bad - checking admin in every method
public function update(User $user, Post $post): bool
{
    return $user->isAdmin() || $user->id === $post->user_id;
}

public function delete(User $user, Post $post): bool
{
    return $user->isAdmin() || $user->id === $post->user_id;
}
```

### 4. Make User Nullable for Guest Access

```php
// Good - allows guest checks
public function view(?User $user, Post $post): bool
{
    if ($post->is_published) {
        return true;
    }
    
    return $user && $user->id === $post->user_id;
}

// Bad - guests can't be checked
public function view(User $user, Post $post): bool
{
    // This will never run for guests
}
```

### 5. Keep Policies Focused

```php
// Good - focused on authorization
public function update(User $user, Post $post): bool
{
    return $user->id === $post->user_id;
}

// Bad - mixing concerns
public function update(User $user, Post $post): bool
{
    // Update last_activity
    $user->update(['last_activity' => now()]);
    
    // Log action
    Log::info('User updating post');
    
    // Check authorization
    return $user->id === $post->user_id;
}
```

### 6. Use Type Hints

```php
// Good - clear types
public function update(User $user, Post $post): bool

// Bad - no types
public function update($user, $post)
```

### 7. Check Related Models

```php
// Good - comprehensive check
public function delete(User $user, Post $post): Response
{
    if ($user->id !== $post->user_id) {
        return Response::deny('You do not own this post.');
    }
    
    if ($post->hasComments()) {
        return Response::deny('Cannot delete posts with comments.');
    }
    
    if ($post->is_locked) {
        return Response::deny('Post is locked.');
    }
    
    return Response::allow();
}

// Bad - incomplete check
public function delete(User $user, Post $post): bool
{
    return $user->id === $post->user_id;
}
```

### 8. Document Complex Logic

```php
/**
 * Determine if user can refund the order.
 * 
 * Rules:
 * - Must be order owner
 * - Order must be delivered
 * - Must be within 30 days of delivery
 */
public function refund(User $user, Order $order): Response
{
    // ...
}
```

## Quick Reference

| Task | Code |
|------|------|
| Create policy | `php artisan make:policy PolicyName` |
| Create for model | `php artisan make:policy PolicyName --model=Model` |
| Authorize in controller | `$this->authorize('update', $post)` |
| Check with Gate | `Gate::allows('update', $post)` |
| Check with User | `$user->can('update', $post)` |
| Check in Blade | `@can('update', $post)` |
| Check multiple | `@canany(['update', 'delete'], $post)` |
| Authorize resource | `$this->authorizeResource(Post::class, 'post')` |
| Super admin | Use `before()` method |
| Guest access | Make User parameter nullable |
| Custom response | `return Response::deny('message')` |

## Policy Methods Quick Reference

| Method | Purpose | Parameters |
|--------|---------|------------|
| `viewAny()` | View list of resources | `User $user` |
| `view()` | View specific resource | `User $user, Model $model` |
| `create()` | Create new resource | `User $user` |
| `update()` | Update resource | `User $user, Model $model` |
| `delete()` | Delete resource | `User $user, Model $model` |
| `restore()` | Restore soft-deleted | `User $user, Model $model` |
| `forceDelete()` | Permanently delete | `User $user, Model $model` |
| `before()` | Pre-authorization | `User $user, string $ability` |
| `after()` | Post-authorization | `User $user, string $ability, bool $result` |

## Authorization Flow

```
Request to edit post
    ↓
Authorize called
    ↓
Find policy for Post model
    ↓
Run before() method
    ↓
Is result true? → Allow
Is result false? → Deny
Is result null? → Continue
    ↓
Run update() method
    ↓
Return true? → Allow (200 OK)
Return false? → Deny (403 Forbidden)
Return Response::deny()? → Deny with message
```

## Summary

**Policies** provide a clean way to:
- Centralize authorization logic around models
- Keep controllers thin and focused
- Make authorization rules reusable and testable
- Provide clear, maintainable permission checks
- Support guest users and complex authorization rules

**Key concepts**:
- **Policy Methods**: Define what users can do
- **Authorization**: Check permissions before actions
- **before()**: Global rules (like admin bypass)
- **Response Objects**: Return messages with denials
- **Guest Access**: Nullable user parameter
- **Testing**: Verify authorization logic works

Policies make authorization in Laravel organized, maintainable, and secure!
