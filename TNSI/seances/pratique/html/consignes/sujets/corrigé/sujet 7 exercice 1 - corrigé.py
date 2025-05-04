def multiplication(n1, n2):
    var = 0
    if (n1 < 0 and n2 < 0) or (n2 < 0 < n1):
        for _ in range(-n2):
            var -= n1
    else:
        for _ in range(n2):
            var += n1
    return var

print(multiplication(3, 5))
print(multiplication(-4, -8))
print(multiplication(-2, 6))
print(multiplication(-2, 0))