def max_et_indice(tab):
    max = tab[0]
    indice = 0
    attemps = 0
    for i in tab:
        if i > max:
            max = i
            indice = attemps
        attemps += 1
    return max, indice

print(max_et_indice([1, 5, 6, 9, 1, 2, 3, 7, 9, 8]))
print(max_et_indice([-2]))
print(max_et_indice([-1, -1, 3, 3, 3]))
print(max_et_indice([1, 1, 1, 1]))
