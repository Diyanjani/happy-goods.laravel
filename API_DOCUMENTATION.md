# Laravel Sanctum API Documentation

## Base URL
```
http://127.0.0.1:8000/api/v1
```

## Authentication
This API uses Laravel Sanctum for authentication. After login/register, include the token in the Authorization header:

```
Authorization: Bearer YOUR_TOKEN_HERE
```

## Endpoints

### Authentication

#### Register
- **POST** `/register`
- **Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

#### Login
- **POST** `/login`
- **Body:**
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

#### Get User Info
- **GET** `/user`
- **Headers:** `Authorization: Bearer TOKEN`

#### Logout
- **POST** `/logout`
- **Headers:** `Authorization: Bearer TOKEN`

#### Logout All Devices
- **POST** `/logout-all`
- **Headers:** `Authorization: Bearer TOKEN`

### Products

#### Get All Products (Public)
- **GET** `/products`
- **Query Parameters:**
  - `category_id` - Filter by category
  - `search` - Search in name/description
  - `min_price` - Minimum price filter
  - `max_price` - Maximum price filter
  - `sort_by` - Sort field (name, price, created_at)
  - `sort_order` - Sort direction (asc, desc)
  - `per_page` - Items per page (default: 15)

#### Get Single Product (Public)
- **GET** `/products/{id}`

#### Create Product (Admin Only)
- **POST** `/products`
- **Headers:** `Authorization: Bearer TOKEN`
- **Body:**
```json
{
    "name": "Product Name",
    "description": "Product description",
    "price": 99.99,
    "stock_quantity": 50,
    "category_id": 1,
    "image_url": "https://example.com/image.jpg"
}
```

#### Update Product (Admin Only)
- **PUT** `/products/{id}`
- **Headers:** `Authorization: Bearer TOKEN`
- **Body:** Same as create (all fields optional)

#### Delete Product (Admin Only)
- **DELETE** `/products/{id}`
- **Headers:** `Authorization: Bearer TOKEN`

### Cart Management

#### Get Cart Items
- **GET** `/cart`
- **Headers:** `Authorization: Bearer TOKEN`

#### Add Item to Cart
- **POST** `/cart/add`
- **Headers:** `Authorization: Bearer TOKEN`
- **Body:**
```json
{
    "product_id": 1,
    "quantity": 2
}
```

#### Update Cart Item
- **PUT** `/cart/{cart_item_id}`
- **Headers:** `Authorization: Bearer TOKEN`
- **Body:**
```json
{
    "quantity": 3
}
```

#### Remove Cart Item
- **DELETE** `/cart/{cart_item_id}`
- **Headers:** `Authorization: Bearer TOKEN`

#### Clear Cart
- **DELETE** `/cart`
- **Headers:** `Authorization: Bearer TOKEN`

### Categories

#### Get All Categories
- **GET** `/categories`
- **Headers:** `Authorization: Bearer TOKEN`

## Response Format

### Success Response
```json
{
    "success": true,
    "message": "Operation successful",
    "data": { ... }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error message",
    "errors": { ... }
}
```

## Example Usage

### 1. Register a new user
```bash
curl -X POST http://127.0.0.1:8000/api/v1/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### 2. Login
```bash
curl -X POST http://127.0.0.1:8000/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'
```

### 3. Get products (public)
```bash
curl http://127.0.0.1:8000/api/v1/products
```

### 4. Add item to cart (authenticated)
```bash
curl -X POST http://127.0.0.1:8000/api/v1/cart/add \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "product_id": 1,
    "quantity": 2
  }'
```

## Features

✅ **Token-based Authentication** using Laravel Sanctum
✅ **Role-based Access Control** (Admin/Customer)
✅ **Product Management** (CRUD operations)
✅ **Shopping Cart** functionality
✅ **Search and Filtering** for products
✅ **JSON Response Format** for all endpoints
✅ **Input Validation** and error handling
✅ **Token Management** (logout, logout all devices)