def multiplication(n1, n2):
    result = 0
    if n2 > 0:
        for _ in range(n2):
            result += n1
        return result
    elif n2 < 0 and n1 < 0:
        for _ in range(-n2):
            result -= n1
        return result
    elif n2 > 0 > n1:
        for _ in range(n2):
            result += n1
        return result
    elif n1 > 0 > n2:
        for _ in range(-n2):
            result -= n1
        return result
    if n1 == 0 or n2 == 0:
        return 0

print(multiplication(3, 5))
print(multiplication(-4, -8))
print(multiplication(-2, 6))
print(multiplication(-2, 0))
