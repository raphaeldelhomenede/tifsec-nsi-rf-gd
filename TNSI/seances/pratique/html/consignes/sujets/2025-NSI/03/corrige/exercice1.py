def fibonacci(n):
    if n < 3:
        return 1
    else:
        return fibonacci(n-1) + fibonacci(n-2)

print(fibonacci(1))
print(fibonacci(2))
print(fibonacci(25))
