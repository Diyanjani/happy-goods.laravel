# 🔐 Laravel Sanctum API Authentication Guide

## Overview
Your Laravel application is already configured with **Laravel Sanctum** for API authentication. This guide covers how to use and test the authentication system.

## 🚀 Current Implementation Status

### ✅ Already Configured:
- **Laravel Sanctum Package** - Installed and configured
- **User Model** - HasApiTokens trait included
- **API Routes** - Authentication endpoints implemented
- **AuthController** - Complete with login/register/logout
- **Middleware** - ForceJsonResponse for API routes
- **Token Management** - Create, revoke, and manage tokens

## 📋 Available API Endpoints

### 🔓 Public Endpoints (No Authentication Required)

#### Health Check
```http
GET /api/v1/health
```
**Response:**
```json
{
    "success": true,
    "message": "Grocery Store API is running",
    "version": "1.0.0",
    "timestamp": "2025-09-29T12:00:00Z"
}
```

#### User Registration
```http
POST /api/v1/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "role": "customer"
    },
    "token": "1|abcdef...",
    "token_type": "Bearer"
}
```

#### User Login
```http
POST /api/v1/login
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "Login successful",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "role": "customer"
    },
    "token": "2|ghijkl...",
    "token_type": "Bearer"
}
```

#### Get Products (Public)
```http
GET /api/v1/products
```

#### Get Single Product (Public)
```http
GET /api/v1/products/{id}
```

### 🔐 Protected Endpoints (Authentication Required)

**Note:** All protected endpoints require the `Authorization: Bearer {token}` header.

#### Get Current User
```http
GET /api/v1/user
Authorization: Bearer {your-token}
```

#### Logout Current Session
```http
POST /api/v1/logout
Authorization: Bearer {your-token}
```

#### Logout All Sessions
```http
POST /api/v1/logout-all
Authorization: Bearer {your-token}
```

#### Cart Management
```http
# Get cart items
GET /api/v1/cart
Authorization: Bearer {your-token}

# Add item to cart
POST /api/v1/cart/add
Authorization: Bearer {your-token}
Content-Type: application/json

{
    "product_id": 1,
    "quantity": 2
}

# Update cart item
PUT /api/v1/cart/{cart_item_id}
Authorization: Bearer {your-token}
Content-Type: application/json

{
    "quantity": 3
}

# Remove cart item
DELETE /api/v1/cart/{cart_item_id}
Authorization: Bearer {your-token}

# Clear entire cart
DELETE /api/v1/cart
Authorization: Bearer {your-token}
```

#### Categories
```http
GET /api/v1/categories
Authorization: Bearer {your-token}
```

#### Product Management (Admin only)
```http
# Create product
POST /api/v1/products
Authorization: Bearer {admin-token}

# Update product
PUT /api/v1/products/{id}
Authorization: Bearer {admin-token}

# Delete product
DELETE /api/v1/products/{id}
Authorization: Bearer {admin-token}
```

## 🧪 Testing Your API

### Option 1: Web Interface (Easiest)
1. Start your Laravel server: `php artisan serve`
2. Visit: `http://127.0.0.1:8000/api-tester`
3. Use the interactive interface to test all endpoints

### Option 2: Command Line with cURL

#### Register a new user:
```bash
curl -X POST http://127.0.0.1:8000/api/v1/register \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

#### Login:
```bash
curl -X POST http://127.0.0.1:8000/api/v1/login \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "email": "test@example.com",
    "password": "password123"
  }'
```

#### Use authenticated endpoint:
```bash
curl -X GET http://127.0.0.1:8000/api/v1/user \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Accept: application/json"
```

### Option 3: Postman/Insomnia
1. Import the endpoints from this documentation
2. Set up environment variables for base URL and token
3. Test each endpoint systematically

## 🛡️ Security Features

### Token Management
- **Automatic Token Revocation**: Login revokes all existing tokens
- **Selective Logout**: `/logout` revokes current token only
- **Complete Logout**: `/logout-all` revokes all user tokens
- **Token Expiration**: Configurable in `config/sanctum.php`

### Middleware Protection
- **ForceJsonResponse**: Ensures API routes return JSON
- **auth:sanctum**: Protects authenticated routes
- **CORS Support**: Configured for cross-origin requests

### Validation
- **Input Validation**: All endpoints validate incoming data
- **Error Handling**: Consistent error response format
- **Rate Limiting**: Can be configured per route

## 🔧 Configuration

### Environment Variables
```env
# In your .env file
SANCTUM_STATEFUL_DOMAINS=localhost,localhost:3000,127.0.0.1,127.0.0.1:8000
```

### Token Expiration
Edit `config/sanctum.php`:
```php
'expiration' => 60, // minutes (null = never expire)
```

### CORS Configuration
Edit `config/cors.php` if needed for frontend integration.

## 🐛 Troubleshooting

### Common Issues:

#### "Unauthenticated" Error
- Check that you're including the `Authorization: Bearer {token}` header
- Verify the token is valid and not expired
- Ensure you're using the correct API endpoint

#### "Token Mismatch" Error
- Make sure you're including the CSRF token for web requests
- For API-only usage, this shouldn't be needed

#### "Method Not Allowed" Error
- Check the HTTP method (GET, POST, PUT, DELETE)
- Verify the endpoint URL is correct

### Debug Mode
Enable debug mode in `.env` for detailed error messages:
```env
APP_DEBUG=true
```

## 📝 Example Frontend Integration

### JavaScript (Fetch API)
```javascript
// Login and store token
async function login(email, password) {
    const response = await fetch('/api/v1/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email, password })
    });
    
    const data = await response.json();
    if (data.success) {
        localStorage.setItem('api_token', data.token);
        return data;
    }
    throw new Error(data.message);
}

// Make authenticated request
async function getUser() {
    const token = localStorage.getItem('api_token');
    const response = await fetch('/api/v1/user', {
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    });
    
    return await response.json();
}
```

### React Example
```jsx
import { useState, useEffect } from 'react';

function useAuth() {
    const [user, setUser] = useState(null);
    const [token, setToken] = useState(localStorage.getItem('api_token'));
    
    useEffect(() => {
        if (token) {
            fetchUser();
        }
    }, [token]);
    
    const fetchUser = async () => {
        try {
            const response = await fetch('/api/v1/user', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });
            const data = await response.json();
            if (data.success) {
                setUser(data.user);
            }
        } catch (error) {
            console.error('Failed to fetch user:', error);
            logout();
        }
    };
    
    const login = async (email, password) => {
        const response = await fetch('/api/v1/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });
        
        const data = await response.json();
        if (data.success) {
            setToken(data.token);
            setUser(data.user);
            localStorage.setItem('api_token', data.token);
        }
        return data;
    };
    
    const logout = () => {
        setToken(null);
        setUser(null);
        localStorage.removeItem('api_token');
    };
    
    return { user, token, login, logout };
}
```

## 🚀 Next Steps

1. **Test the API**: Use the web tester at `/api-tester`
2. **Create Admin User**: Use the seeder or register manually
3. **Frontend Integration**: Connect your frontend application
4. **Add More Endpoints**: Extend the API as needed
5. **Deploy**: Configure production settings

Your Laravel Sanctum authentication is ready to use! 🎉