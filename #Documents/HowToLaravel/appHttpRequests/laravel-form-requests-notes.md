# Laravel Form Requests - Complete Guide

## What Are Form Requests?

Form Requests are custom request classes that encapsulate validation logic and authorization rules. Instead of cluttering your controllers with validation, you move it to dedicated request classes.

### The Problem They Solve

```php
// Without Form Request - messy controller
public function store(Request $request)
{
    // 20+ lines of validation
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
        // ... many more rules
    ]);
    
    // Check authorization
    if (!auth()->user()->can('create', Post::class)) {
        abort(403);
    }
    
    // Finally, create the post
    Post::create($validated);
}
```

```php
// With Form Request - clean controller
public function store(StorePostRequest $request)
{
    // Validation and authorization already done!
    Post::create($request->validated());
}
```

### Why Use Form Requests?

- **Clean Controllers**: Keep controllers thin and focused
- **Reusability**: Use same validation in multiple places
- **Separation of Concerns**: Validation logic in one place
- **Authorization**: Built-in authorization checks
- **Testability**: Easy to test validation rules separately
- **Custom Messages**: Define custom error messages
- **Type Safety**: IDE autocomplete for validated data

## File Locations

```
app/Http/Requests/StorePostRequest.php
app/Http/Requests/UpdatePostRequest.php
app/Http/Requests/Auth/LoginRequest.php
app/Http/Requests/Api/StoreProductRequest.php
```

## Creating Form Requests

### Generate Form Request

```bash
php artisan make:request StorePostRequest
```

This creates: `app/Http/Requests/StorePostRequest.php`

### Basic Form Request Structure

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false; // Change to true or add authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Your validation rules here
        ];
    }
}
```

## Validation Rules

### Basic Validation Rules

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug',
            'content' => 'required|string|min:100',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'published_at' => 'nullable|date|after:now',
            'featured_image' => 'nullable|image|max:2048', // max 2MB
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
        ];
    }
}
```

### Array Validation Rules

```php
// app/Http/Requests/StoreOrderRequest.php

public function rules(): array
{
    return [
        'items' => 'required|array|min:1',
        'items.*.product_id' => 'required|integer|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1|max:100',
        'items.*.price' => 'required|numeric|min:0',
        
        'shipping_address' => 'required|array',
        'shipping_address.street' => 'required|string|max:255',
        'shipping_address.city' => 'required|string|max:100',
        'shipping_address.state' => 'required|string|size:2',
        'shipping_address.zip' => 'required|string|regex:/^\d{5}$/',
        
        'billing_same_as_shipping' => 'boolean',
        'billing_address' => 'required_if:billing_same_as_shipping,false|array',
    ];
}
```

### Conditional Validation Rules

```php
public function rules(): array
{
    return [
        'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
        
        // Only required if payment method is credit_card
        'card_number' => 'required_if:payment_method,credit_card|string',
        'card_expiry' => 'required_if:payment_method,credit_card|string',
        'card_cvv' => 'required_if:payment_method,credit_card|digits:3',
        
        // Only required if payment method is bank_transfer
        'bank_account' => 'required_if:payment_method,bank_transfer|string',
        'routing_number' => 'required_if:payment_method,bank_transfer|string',
        
        // Only required if payment method is paypal
        'paypal_email' => 'required_if:payment_method,paypal|email',
    ];
}
```

### Update Request with Ignore Rule

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user')->id;
        
        return [
            'name' => 'required|string|max:255',
            
            // Ignore current user's email when checking uniqueness
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            
            // Ignore current user's username
            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($userId),
            ],
            
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }
}
```

### File Upload Validation

```php
public function rules(): array
{
    return [
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'documents' => 'required|array|min:1',
        'documents.*' => 'file|mimes:pdf,doc,docx|max:5120', // 5MB
        'photos' => 'array',
        'photos.*' => 'image|dimensions:min_width=100,min_height=100',
    ];
}
```

### Custom Validation Rules

```php
public function rules(): array
{
    return [
        'age' => 'required|integer|min:18|max:120',
        'email' => 'required|email|unique:users,email',
        'phone' => ['required', 'regex:/^[0-9]{10}$/'],
        'website' => 'nullable|url|active_url',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',      // must contain lowercase
            'regex:/[A-Z]/',      // must contain uppercase
            'regex:/[0-9]/',      // must contain number
            'regex:/[@$!%*#?&]/', // must contain special char
        ],
    ];
}
```

## Authorization

### Basic Authorization

```php
public function authorize(): bool
{
    // Allow all authenticated users
    return auth()->check();
}
```

### Role-Based Authorization

```php
public function authorize(): bool
{
    // Only admins can create posts
    return auth()->user()?->isAdmin() ?? false;
}
```

### Resource-Based Authorization

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Get the post from the route
        $post = $this->route('post');
        
        // Check if user owns the post or is admin
        return $post->user_id === auth()->id() 
            || auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
}
```

### Policy-Based Authorization

```php
public function authorize(): bool
{
    // Use policy to check authorization
    return $this->user()->can('update', $this->route('post'));
}
```

### Multiple Authorization Conditions

```php
public function authorize(): bool
{
    $user = auth()->user();
    $post = $this->route('post');
    
    // User must be authenticated
    if (!$user) {
        return false;
    }
    
    // User must own the post OR be an admin OR be a moderator
    return $post->user_id === $user->id
        || $user->isAdmin()
        || $user->isModerator();
}
```

## Custom Error Messages

### Basic Custom Messages

```php
public function rules(): array
{
    return [
        'title' => 'required|max:255',
        'email' => 'required|email|unique:users',
    ];
}

public function messages(): array
{
    return [
        'title.required' => 'Please enter a title for your post.',
        'title.max' => 'The title cannot be longer than 255 characters.',
        'email.required' => 'We need your email address.',
        'email.email' => 'Please provide a valid email address.',
        'email.unique' => 'This email is already registered.',
    ];
}
```

### Custom Attribute Names

```php
public function rules(): array
{
    return [
        'user_email' => 'required|email',
        'user_password' => 'required|min:8',
    ];
}

public function attributes(): array
{
    return [
        'user_email' => 'email address',
        'user_password' => 'password',
    ];
}

// Now error messages will say "The email address field is required"
// instead of "The user_email field is required"
```

### Dynamic Error Messages

```php
public function messages(): array
{
    return [
        'items.*.product_id.required' => 'Each item must have a product.',
        'items.*.product_id.exists' => 'Product :input does not exist.',
        'items.*.quantity.min' => 'Quantity must be at least :min.',
        'items.*.quantity.max' => 'Cannot order more than :max units.',
    ];
}
```

## Custom Validation Logic

### After Validation Hook

```php
use Illuminate\Validation\Validator;

protected function withValidator(Validator $validator): void
{
    $validator->after(function (Validator $validator) {
        // Custom validation logic after all rules pass
        
        if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add(
                'field',
                'Something is wrong with this field!'
            );
        }
    });
}
```

### Complex Business Logic Validation

```php
<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ];
    }

    protected function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            // Check stock availability for each item
            foreach ($this->items as $index => $item) {
                $product = Product::find($item['product_id']);
                
                if ($product && $product->stock < $item['quantity']) {
                    $validator->errors()->add(
                        "items.{$index}.quantity",
                        "Only {$product->stock} units available for {$product->name}"
                    );
                }
            }
            
            // Check total order value
            $total = collect($this->items)->sum(function ($item) {
                $product = Product::find($item['product_id']);
                return $product->price * $item['quantity'];
            });
            
            if ($total < 10) {
                $validator->errors()->add(
                    'items',
                    'Minimum order value is $10.00'
                );
            }
        });
    }
}
```

### Conditional Validation Rules (Advanced)

```php
public function rules(): array
{
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ];
    
    // Add additional rules based on conditions
    if ($this->has('send_newsletter')) {
        $rules['newsletter_preference'] = 'required|in:daily,weekly,monthly';
    }
    
    if ($this->user()->isAdmin()) {
        $rules['role'] = 'required|in:admin,editor,author';
    }
    
    return $rules;
}
```

## Preparing Input for Validation

### Prepare for Validation

```php
protected function prepareForValidation(): void
{
    // Clean/format data before validation
    $this->merge([
        'slug' => \Str::slug($this->title),
        'phone' => preg_replace('/[^0-9]/', '', $this->phone),
    ]);
}
```

### Advanced Data Preparation

```php
protected function prepareForValidation(): void
{
    // Convert boolean strings to actual booleans
    $this->merge([
        'is_featured' => filter_var($this->is_featured, FILTER_VALIDATE_BOOLEAN),
        'published' => filter_var($this->published, FILTER_VALIDATE_BOOLEAN),
    ]);
    
    // Trim all string inputs
    $this->merge(
        collect($this->all())
            ->map(fn ($value) => is_string($value) ? trim($value) : $value)
            ->toArray()
    );
    
    // Set default values
    $this->merge([
        'status' => $this->status ?? 'draft',
        'published_at' => $this->published_at ?? now(),
    ]);
}
```

## Using Form Requests in Controllers

### Basic Usage

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        // Validation and authorization already passed!
        // Get validated data
        $validated = $request->validated();
        
        // Create post
        $post = Post::create($validated);
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully!');
    }
}
```

### Accessing Validated Data

```php
public function store(StorePostRequest $request)
{
    // Get all validated data
    $validated = $request->validated();
    
    // Get specific validated fields
    $title = $request->validated('title');
    $content = $request->validated('content');
    
    // Get validated data with defaults
    $excerpt = $request->validated('excerpt', 'No excerpt provided');
    
    // Get only specific validated fields
    $data = $request->safe()->only(['title', 'content']);
    
    // Get all except specific fields
    $data = $request->safe()->except(['_token']);
    
    // Use validated data
    Post::create($validated);
}
```

### Accessing Non-Validated Data

```php
public function store(StorePostRequest $request)
{
    // Get validated data
    $validated = $request->validated();
    
    // Still can access other request data
    $ipAddress = $request->ip();
    $userAgent = $request->userAgent();
    $allInput = $request->all();
    
    Post::create($validated);
}
```

### File Uploads

```php
public function store(StorePostRequest $request)
{
    $validated = $request->validated();
    
    // Handle file upload
    if ($request->hasFile('featured_image')) {
        $path = $request->file('featured_image')->store('posts', 'public');
        $validated['featured_image'] = $path;
    }
    
    // Multiple files
    if ($request->hasFile('attachments')) {
        $paths = [];
        foreach ($request->file('attachments') as $file) {
            $paths[] = $file->store('attachments', 'public');
        }
        $validated['attachments'] = $paths;
    }
    
    Post::create($validated);
}
```

## Complete Working Examples

### Example 1: Blog Post Creation

#### StorePostRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only authenticated users can create posts
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug'),
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', // slug format
            ],
            'content' => 'required|string|min:100',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date|after:now',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please provide a title for your post.',
            'title.max' => 'The title is too long. Maximum 255 characters.',
            'slug.required' => 'The URL slug is required.',
            'slug.unique' => 'This URL slug is already in use.',
            'slug.regex' => 'The URL slug must contain only lowercase letters, numbers, and hyphens.',
            'content.required' => 'Post content cannot be empty.',
            'content.min' => 'Post content must be at least 100 characters.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category does not exist.',
            'featured_image.image' => 'The file must be an image.',
            'featured_image.max' => 'The image size must not exceed 2MB.',
            'status.in' => 'Status must be either draft or published.',
            'published_at.after' => 'Publish date must be in the future.',
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'category',
            'featured_image' => 'image',
            'published_at' => 'publish date',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Auto-generate slug if not provided
        if (!$this->slug && $this->title) {
            $this->merge([
                'slug' => \Str::slug($this->title),
            ]);
        }
        
        // Set default status
        $this->merge([
            'status' => $this->status ?? 'draft',
        ]);
    }
}
```

#### UpdatePostRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        $post = $this->route('post');
        
        // User must own the post or be admin
        return $post->user_id === auth()->id() 
            || auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        $postId = $this->route('post')->id;
        
        return [
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($postId),
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
            ],
            'content' => 'required|string|min:100',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
        ];
    }
}
```

#### PostController.php

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }
        
        // Add user_id
        $validated['user_id'] = auth()->id();
        
        // Create post
        $post = Post::create($validated);
        
        // Attach tags if provided
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post created successfully!');
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                \Storage::disk('public')->delete($post->featured_image);
            }
            
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }
        
        // Update post
        $post->update($validated);
        
        // Sync tags
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }
        
        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }
}
```

### Example 2: E-commerce Order

#### StoreOrderRequest.php

```php
<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1|max:100',
            
            'shipping_address' => 'required|array',
            'shipping_address.street' => 'required|string|max:255',
            'shipping_address.city' => 'required|string|max:100',
            'shipping_address.state' => 'required|string|max:100',
            'shipping_address.zip' => 'required|string',
            'shipping_address.country' => 'required|string|max:100',
            
            'billing_same_as_shipping' => 'boolean',
            'billing_address' => 'required_if:billing_same_as_shipping,false|array',
            
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
            
            'discount_code' => 'nullable|string|exists:discount_codes,code',
            
            'notes' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => 'Your cart is empty.',
            'items.min' => 'Your cart must have at least one item.',
            'items.*.product_id.exists' => 'One or more products no longer exist.',
            'items.*.quantity.min' => 'Quantity must be at least 1.',
            'items.*.quantity.max' => 'Cannot order more than 100 units of a product.',
            'shipping_address.required' => 'Please provide a shipping address.',
            'payment_method.required' => 'Please select a payment method.',
            'discount_code.exists' => 'Invalid discount code.',
        ];
    }

    protected function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            // Check stock availability
            foreach ($this->items as $index => $item) {
                $product = Product::find($item['product_id']);
                
                if (!$product) {
                    continue;
                }
                
                if (!$product->is_available) {
                    $validator->errors()->add(
                        "items.{$index}.product_id",
                        "{$product->name} is no longer available."
                    );
                }
                
                if ($product->stock < $item['quantity']) {
                    $validator->errors()->add(
                        "items.{$index}.quantity",
                        "Only {$product->stock} units of {$product->name} available."
                    );
                }
            }
            
            // Validate minimum order value
            $total = $this->calculateTotal();
            if ($total < 10) {
                $validator->errors()->add(
                    'items',
                    'Minimum order value is $10.00. Current total: $' . number_format($total, 2)
                );
            }
        });
    }

    protected function prepareForValidation(): void
    {
        // Set billing same as shipping default
        $this->merge([
            'billing_same_as_shipping' => $this->billing_same_as_shipping ?? true,
        ]);
        
        // If billing same as shipping, copy shipping address
        if ($this->billing_same_as_shipping) {
            $this->merge([
                'billing_address' => $this->shipping_address,
            ]);
        }
    }

    private function calculateTotal(): float
    {
        $total = 0;
        
        foreach ($this->items as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $total += $product->price * $item['quantity'];
            }
        }
        
        return $total;
    }
}
```

### Example 3: User Registration

#### RegisterRequest.php

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Anyone can register
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
                'regex:/^[a-zA-Z0-9_]+$/', // alphanumeric and underscore only
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed',
            ],
            'phone' => 'nullable|string|regex:/^[0-9]{10}$/',
            'date_of_birth' => 'required|date|before:today|after:1900-01-01',
            'terms' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'email.unique' => 'This email is already registered.',
            'username.unique' => 'This username is already taken.',
            'username.regex' => 'Username can only contain letters, numbers, and underscores.',
            'password.confirmed' => 'Password confirmation does not match.',
            'phone.regex' => 'Phone number must be 10 digits.',
            'date_of_birth.before' => 'You must be born before today.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Trim whitespace
        $this->merge([
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),
            'username' => strtolower(trim($this->username)),
        ]);
        
        // Remove non-numeric from phone
        if ($this->phone) {
            $this->merge([
                'phone' => preg_replace('/[^0-9]/', '', $this->phone),
            ]);
        }
    }
}
```

## API Form Requests

### JSON API Validation

```php
<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Handle a failed validation attempt (for API).
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422)
        );
    }

    /**
     * Handle a failed authorization attempt (for API).
     */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403)
        );
    }
}
```

## Testing Form Requests

```php
<?php

namespace Tests\Feature;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StorePostRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_validation_passes_with_valid_data()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        
        $data = [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => str_repeat('Lorem ipsum dolor sit amet. ', 20),
            'category_id' => $category->id,
            'status' => 'draft',
        ];
        
        $request = new StorePostRequest();
        $validator = Validator::make($data, $request->rules());
        
        $this->assertFalse($validator->fails());
    }

    public function test_validation_fails_without_title()
    {
        $data = [
            'content' => 'Some content',
        ];
        
        $request = new StorePostRequest();
        $validator = Validator::make($data, $request->rules());
        
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('title', $validator->errors()->toArray());
    }

    public function test_validation_fails_with_short_content()
    {
        $data = [
            'title' => 'Test',
            'content' => 'Too short',
        ];
        
        $request = new StorePostRequest();
        $validator = Validator::make($data, $request->rules());
        
        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('content', $validator->errors()->toArray());
    }

    public function test_authorization_passes_for_authenticated_users()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $request = StorePostRequest::create('/posts', 'POST');
        
        $this->assertTrue($request->authorize());
    }

    public function test_authorization_fails_for_guests()
    {
        $request = StorePostRequest::create('/posts', 'POST');
        
        $this->assertFalse($request->authorize());
    }
}
```

## Best Practices

### 1. Keep Validation Rules Clear and Organized

```php
// Good - organized and readable
public function rules(): array
{
    return [
        // Basic info
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        
        // Address
        'street' => 'required|string',
        'city' => 'required|string',
        'zip' => 'required|string',
        
        // Optional fields
        'phone' => 'nullable|string',
        'website' => 'nullable|url',
    ];
}

// Bad - hard to read
public function rules(): array
{
    return ['name'=>'required|string|max:255','email'=>'required|email|unique:users','street'=>'required|string','city'=>'required|string'];
}
```

### 2. Use Array Syntax for Complex Rules

```php
// Good - clear and allows comments
public function rules(): array
{
    return [
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',      // lowercase
            'regex:/[A-Z]/',      // uppercase
            'regex:/[0-9]/',      // number
            'regex:/[@$!%*#?&]/', // special char
            'confirmed',
        ],
    ];
}

// Acceptable but less flexible
public function rules(): array
{
    return [
        'password' => 'required|string|min:8|confirmed',
    ];
}
```

### 3. Provide Helpful Error Messages

```php
// Good - specific and helpful
public function messages(): array
{
    return [
        'email.unique' => 'This email address is already registered. Try logging in instead.',
        'password.min' => 'Your password must be at least :min characters for security.',
    ];
}

// Bad - generic
public function messages(): array
{
    return [
        'email.unique' => 'Invalid.',
        'password.min' => 'Too short.',
    ];
}
```

### 4. Use Separate Requests for Store and Update

```php
// Good - separate concerns
StorePostRequest  // For creating
UpdatePostRequest // For updating

// Bad - one request trying to handle both
PostRequest // Has to handle both create and update logic
```

### 5. Prepare Data Before Validation

```php
// Good - clean data first
protected function prepareForValidation(): void
{
    $this->merge([
        'email' => strtolower(trim($this->email)),
        'phone' => preg_replace('/[^0-9]/', '', $this->phone),
    ]);
}

// Then validate clean data
public function rules(): array
{
    return [
        'email' => 'required|email',
        'phone' => 'required|digits:10',
    ];
}
```

### 6. Use Type Hints

```php
// Good - clear types
public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [];
}

// Bad - no type hints
public function authorize()
{
    return true;
}

public function rules()
{
    return [];
}
```

### 7. Keep Complex Logic in Services

```php
// Bad - too much business logic in request
protected function withValidator(Validator $validator): void
{
    $validator->after(function (Validator $validator) {
        // 50 lines of complex business logic
    });
}

// Good - delegate to service
protected function withValidator(Validator $validator): void
{
    $validator->after(function (Validator $validator) {
        $orderValidator = new OrderValidationService();
        
        if (!$orderValidator->isValid($this->all())) {
            $validator->errors()->add('order', $orderValidator->getError());
        }
    });
}
```

### 8. Document Custom Validation

```php
/**
 * Validate order items have sufficient stock.
 */
protected function withValidator(Validator $validator): void
{
    $validator->after(function (Validator $validator) {
        foreach ($this->items as $index => $item) {
            // Stock check logic
        }
    });
}
```

## Quick Reference

| Task | Code |
|------|------|
| Create request | `php artisan make:request RequestName` |
| Authorization | `public function authorize(): bool` |
| Validation rules | `public function rules(): array` |
| Custom messages | `public function messages(): array` |
| Custom attributes | `public function attributes(): array` |
| After validation | `protected function withValidator(Validator $validator)` |
| Prepare data | `protected function prepareForValidation()` |
| Get validated data | `$request->validated()` |
| Get specific field | `$request->validated('field')` |
| Get safe data | `$request->safe()->only(['field'])` |
| Use in controller | Type-hint in method parameter |
| Failed validation (API) | Override `failedValidation()` |
| Failed authorization (API) | Override `failedAuthorization()` |

## Common Validation Rules

| Rule | Description | Example |
|------|-------------|---------|
| `required` | Field must be present | `'name' => 'required'` |
| `nullable` | Field can be null | `'phone' => 'nullable'` |
| `string` | Must be string | `'name' => 'string'` |
| `integer` | Must be integer | `'age' => 'integer'` |
| `numeric` | Must be numeric | `'price' => 'numeric'` |
| `email` | Must be valid email | `'email' => 'email'` |
| `url` | Must be valid URL | `'website' => 'url'` |
| `date` | Must be valid date | `'dob' => 'date'` |
| `boolean` | Must be boolean | `'active' => 'boolean'` |
| `array` | Must be array | `'items' => 'array'` |
| `min:value` | Minimum value/length | `'age' => 'min:18'` |
| `max:value` | Maximum value/length | `'title' => 'max:255'` |
| `between:min,max` | Between range | `'price' => 'between:0,1000'` |
| `in:foo,bar` | Must be in list | `'status' => 'in:draft,published'` |
| `exists:table,column` | Must exist in DB | `'user_id' => 'exists:users,id'` |
| `unique:table,column` | Must be unique in DB | `'email' => 'unique:users,email'` |
| `confirmed` | Must match _confirmation | `'password' => 'confirmed'` |
| `regex:pattern` | Must match regex | `'phone' => 'regex:/^[0-9]{10}$/'` |
| `image` | Must be image file | `'avatar' => 'image'` |
| `mimes:jpg,png` | Allowed file types | `'file' => 'mimes:pdf,doc'` |
| `dimensions:min_width=100` | Image dimensions | `'photo' => 'dimensions:min_width=100'` |
| `required_if:field,value` | Required if condition | `'tax_id' => 'required_if:country,US'` |
| `required_with:field` | Required with another | `'state' => 'required_with:city'` |
| `required_without:field` | Required without another | `'email' => 'required_without:phone'` |
