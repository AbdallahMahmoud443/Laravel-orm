<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# Laravel-orm" 
In Laravel ORM, there's a **specific order of operations** that should be followed when building queries for optimal performance and readability. Here's the recommended sequence:

## Correct Order of Query Operations

### 1. **Model/Table Selection**
```php
// Start with model or table
User::query() // or DB::table('users')
```

### 2. **SELECT Clauses** (Early)
```php
->select(['id', 'name', 'email'])
->selectRaw('COUNT(*) as total')
->addSelect('created_at')
```

### 3. **JOIN Operations**
```php
->join('profiles', 'users.id', '=', 'profiles.user_id')
->leftJoin('orders', 'users.id', '=', 'orders.user_id')
->rightJoin('roles', 'users.role_id', '=', 'roles.id')
```

### 4. **WHERE Clauses** (Filtering)
```php
->where('status', 'active')
->whereNotNull('email_verified_at')
->whereBetween('age', [18, 65])
->whereIn('role', ['admin', 'editor'])
```

### 5. **GROUP BY**
```php
->groupBy('department_id')
->groupByRaw('YEAR(created_at)')
```

### 6. **HAVING Clauses**
```php
->having('total_orders', '>', 5)
->havingRaw('SUM(amount) > 1000')
```

### 7. **ORDER BY**
```php
->orderBy('created_at', 'desc')
->orderByRaw('FIELD(status, "active", "pending", "inactive")')
```

### 8. **LIMIT/OFFSET Operations**
```php
->limit(10)
->offset(20)
->take(10)
->skip(20)
```

### 9. **Execution Methods**
```php
->get()
->first()
->find()
->count()
->paginate()
```

## Complete Example with Proper Order

```php
$users = User::select(['id', 'name', 'email', 'created_at'])
    ->join('profiles', 'users.id', '=', 'profiles.user_id')
    ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    ->where('users.status', 'active')
    ->whereNotNull('users.email_verified_at')
    ->whereHas('orders', function ($query) {
        $query->where('status', 'completed');
    })
    ->groupBy('users.id')
    ->having(DB::raw('COUNT(orders.id)'), '>', 3)
    ->orderBy('users.created_at', 'desc')
    ->orderBy('users.name', 'asc')
    ->limit(50)
    ->get();
```

## Detailed Breakdown by Category

### 1. **Selection Operations** (Early Stage)
```php
// Basic selection
User::select('id', 'name', 'email')

// Raw selections
->selectRaw('COUNT(*) as order_count')
->selectSub($subquery, 'total_spent')

// Adding selections
->addSelect('phone')
->addSelect(DB::raw('AVG(rating) as avg_rating'))
```

### 2. **Relationship Operations**
```php
// Eager loading
->with(['profile', 'orders'])
->with('orders:id,user_id,total')

// Relationship existence
->has('orders')
->whereHas('orders', function ($query) {
    $query->where('status', 'completed');
})
->whereDoesntHave('orders')

// Counting relationships
->withCount('orders')
->withCount(['orders as completed_orders_count' => function ($query) {
    $query->where('status', 'completed');
}])
```

### 3. **JOIN Operations** (Before WHERE)
```php
// Different types of joins
User::join('profiles', 'users.id', '=', 'profiles.user_id')
    ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
    ->rightJoin('departments', 'users.department_id', '=', 'departments.id')
    ->crossJoin('settings')
    
// Join with conditions
->join('orders', function ($join) {
    $join->on('users.id', '=', 'orders.user_id')
         ->where('orders.status', '=', 'active');
})
```

### 4. **Filtering Operations** (WHERE Clauses)
```php
// Basic where clauses
->where('status', 'active')
->where('age', '>=', 18)
->where([
    ['status', '=', 'active'],
    ['verified', '=', true]
])

// Advanced where clauses
->whereIn('role', ['admin', 'editor'])
->whereNotIn('status', ['banned', 'suspended'])
->whereBetween('created_at', [$startDate, $endDate])
->whereNull('deleted_at')
->whereNotNull('email_verified_at')

// Date where clauses
->whereDate('created_at', '2023-01-01')
->whereMonth('created_at', 12)
->whereYear('created_at', 2023)

// JSON where clauses
->whereJsonContains('meta->tags', 'php')
->whereJsonLength('meta->tags', 3)

// Raw where clauses
->whereRaw('age > ? AND status = ?', [18, 'active'])
```

### 5. **Grouping and Aggregation**
```php
// Group by
->groupBy('department_id')
->groupBy('department_id', 'role_id')
->groupByRaw('YEAR(created_at), MONTH(created_at)')

// Having clauses (after GROUP BY)
->having('total_orders', '>', 5)
->havingBetween('avg_rating', [4.0, 5.0])
->havingRaw('SUM(amount) > 1000')
```

### 6. **Ordering Operations**
```php
// Basic ordering
->orderBy('created_at', 'desc')
->orderBy('name')  // defaults to 'asc'

// Multiple ordering
->orderBy('priority', 'desc')
->orderBy('created_at', 'asc')

// Raw ordering
->orderByRaw('FIELD
