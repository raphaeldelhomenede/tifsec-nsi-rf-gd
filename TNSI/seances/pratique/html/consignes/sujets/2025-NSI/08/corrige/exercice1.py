def maximum_tableau(tab):
    max = tab[0]
    for i in tab:
        if i > max:
            max = i
    return max

print(maximum_tableau([98, 12, 104, 23, 131, 9]))
print(maximum_tableau([-27, 24, -3, 15]))
