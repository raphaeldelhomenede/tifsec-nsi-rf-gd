def min_et_max(tab):
    min_tab = 0
    max_tab = 0
    for i in range(len(tab)):
        if tab[i] < tab[min_tab]:
            min_tab = i
        if tab[i] > tab[max_tab]:
            max_tab = i
    return {"min": tab[min_tab], "max": tab[max_tab]}

print(min_et_max([0, 1, 4, 2, -2, 9, 3, 1, 7, 1]))
print(min_et_max([0, 1, 2, 3]))
print(min_et_max([3]))
print(min_et_max([1, 3, 2, 1, 3]))
print(min_et_max([-1, -1, -1, -1, -1]))
