def couples_consecutifs(tab):
    result = []
    for i in range(len(tab)-1):
        if tab[i]+1 == tab[i+1]:
            result.append((tab[i], tab[i+1]))
    return result

print(couples_consecutifs([1, 4, 3, 5]))
print(couples_consecutifs([1, 4, 5, 3]))
print(couples_consecutifs([1, 1, 2, 4]))
print(couples_consecutifs([7, 1, 2, 5, 3, 4]))
print(couples_consecutifs([5, 1, 2, 3, 8, -5, -4, 7]))
