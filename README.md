# Simple CRUD API with Laravel 12 and Sanctum

This project is a simple RESTful API built with Laravel 12. It demonstrates user authentication, CRUD operations for posts, and authorization using policies and middleware.

---

## Features

- User registration, login, and logout with Laravel Sanctum
- Create, read, update, and delete posts
- Protect routes using authentication middleware
- Authorize actions using policies (only post owners can update or delete their posts)
- Organized routes with versioning (`/v1` prefix)

---

## API Endpoints

### Authentication

| Method | Endpoint       | Description                  | Auth Required |
|--------|---------------|------------------------------|---------------|
| POST   | `/v1/register` | Register a new user          | No            |
| POST   | `/v1/login`    | Login and receive token      | No            |
| POST   | `/v1/logout`   | Logout current user          | Yes           |

### User

| Method | Endpoint       | Description                | Auth Required |
|--------|---------------|----------------------------|---------------|
| GET    | `/v1/user`     | Get authenticated user info | Yes           |

### Posts

| Method | Endpoint               | Description               | Auth Required |
|--------|------------------------|---------------------------|---------------|
| GET    | `/v1/posts`            | List all posts            | No            |
| POST   | `/v1/posts`            | Create a new post         | Yes           |
| GET    | `/v1/posts/{post}`     | Get a single post by ID   | Yes           |
| PUT    | `/v1/posts/{post}/edit`| Update a post (owner only)| Yes           |
| DELETE | `/v1/posts/{post}/delete` | Delete a post (owner only)| Yes          |

---

## Authorization

- Only authenticated users can create, update, or delete posts.
- Policies ensure that users can only update or delete their own posts.
- Unauthorized attempts return a JSON error message.

---

## Lessons Learned

While building this API, the following concepts were applied and understood:

1. **Route Grouping and Versioning**  
   - Using `Route::prefix` to organize and version endpoints (`/v1`).

2. **Authentication with Sanctum**  
   - Protecting routes using `auth:sanctum` middleware.  
   - Generating, validating, and revoking tokens for user authentication.

3. **Form Requests and Validation**  
   - Using `FormRequest` classes to validate input data (e.g., creating posts).

4. **Policies for Authorization**  
   - Implementing `PostPolicy` to check whether the authenticated user owns the post before allowing update or delete actions.  
   - Returning custom error messages when authorization fails.

5. **Middleware Usage**  
   - Applying middleware to secure routes and integrate authorization checks like `can:update,post`.

---

