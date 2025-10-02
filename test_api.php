#!/usr/bin/env php
<?php

/**
 * Laravel Sanctum API Test Script
 * 
 * This script demonstrates how to use the Grocery Store API with Laravel Sanctum authentication.
 * Make sure your Laravel server is running on http://127.0.0.1:8000
 */

$baseUrl = 'http://127.0.0.1:8000/api/v1';

echo "🛒 Laravel Sanctum API Test Script\n";
echo "==================================\n\n";

// Test 1: Health Check
echo "1. Testing API Health Check...\n";
$response = makeRequest('GET', $baseUrl . '/health');
echo "Status: " . ($response['success'] ? '✅ API is running' : '❌ API error') . "\n";
echo "Message: " . $response['message'] . "\n\n";

// Test 2: Get Products (Public)
echo "2. Testing Public Products Endpoint...\n";
$products = makeRequest('GET', $baseUrl . '/products');
if ($products['success']) {
    echo "✅ Products fetched successfully\n";
    echo "Total products: " . count($products['data']['data']) . "\n\n";
} else {
    echo "❌ Failed to fetch products\n\n";
}

// Test 3: Register User
echo "3. Testing User Registration...\n";
$userData = [
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => 'password123',
    'password_confirmation' => 'password123'
];

$registerResponse = makeRequest('POST', $baseUrl . '/register', $userData);
if ($registerResponse['success']) {
    echo "✅ User registered successfully\n";
    $token = $registerResponse['token'];
    echo "Token received: " . substr($token, 0, 20) . "...\n\n";
    
    // Test 4: Get User Info (Authenticated)
    echo "4. Testing Authenticated User Info...\n";
    $userInfo = makeRequest('GET', $baseUrl . '/user', null, $token);
    if ($userInfo['success']) {
        echo "✅ User info retrieved successfully\n";
        echo "User: " . $userInfo['user']['name'] . " (" . $userInfo['user']['email'] . ")\n\n";
    } else {
        echo "❌ Failed to get user info\n\n";
    }
    
    // Test 5: Add to Cart (if products exist)
    if ($products['success'] && !empty($products['data']['data'])) {
        echo "5. Testing Add to Cart...\n";
        $firstProduct = $products['data']['data'][0];
        $cartData = [
            'product_id' => $firstProduct['id'],
            'quantity' => 2
        ];
        
        $cartResponse = makeRequest('POST', $baseUrl . '/cart/add', $cartData, $token);
        if ($cartResponse['success']) {
            echo "✅ Item added to cart successfully\n";
            echo "Product: " . $firstProduct['name'] . " (Qty: 2)\n\n";
        } else {
            echo "❌ Failed to add item to cart\n";
            echo "Error: " . $cartResponse['message'] . "\n\n";
        }
        
        // Test 6: Get Cart
        echo "6. Testing Get Cart...\n";
        $cartContents = makeRequest('GET', $baseUrl . '/cart', null, $token);
        if ($cartContents['success']) {
            echo "✅ Cart retrieved successfully\n";
            echo "Cart items: " . $cartContents['data']['count'] . "\n";
            echo "Cart total: $" . number_format($cartContents['data']['total'], 2) . "\n\n";
        } else {
            echo "❌ Failed to get cart contents\n\n";
        }
    }
    
    // Test 7: Logout
    echo "7. Testing Logout...\n";
    $logoutResponse = makeRequest('POST', $baseUrl . '/logout', null, $token);
    if ($logoutResponse['success']) {
        echo "✅ User logged out successfully\n\n";
    } else {
        echo "❌ Failed to logout\n\n";
    }
    
} else {
    echo "❌ User registration failed\n";
    echo "Error: " . $registerResponse['message'] . "\n\n";
}

echo "🎉 API Test Completed!\n";
echo "Check the API_DOCUMENTATION.md file for complete usage instructions.\n";

/**
 * Make HTTP request using cURL
 */
function makeRequest($method, $url, $data = null, $token = null) {
    $ch = curl_init();
    
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => array_filter([
            'Content-Type: application/json',
            'Accept: application/json',
            $token ? 'Authorization: Bearer ' . $token : null
        ]),
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    if ($data && in_array($method, ['POST', 'PUT', 'PATCH'])) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if (curl_error($ch)) {
        curl_close($ch);
        return ['success' => false, 'message' => 'Connection error: ' . curl_error($ch)];
    }
    
    curl_close($ch);
    
    $decoded = json_decode($response, true);
    return $decoded ?: ['success' => false, 'message' => 'Invalid JSON response'];
}