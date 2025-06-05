def fusion(tab1, tab2):
    i, j = 0, 0
    tab0 = []

    while i < len(tab1) and j < len(tab2):
        if tab1[i] < tab2[j]:
            tab0.append(tab1[i])
            i += 1
        else:
            tab0.append(tab2[i])
            j += 1

    while i < len(tab1):
        tab0.append(tab1[i])
        i += 1

    while j < len(tab2):
        tab0.append(tab2[j])
        j += 1

    return tab0

print(fusion([3, 5], [2, 5]))
print(fusion([-2, 4], [-3, 5, 10]))
print(fusion([4], [2, 6]))
print(fusion([], []))
print(fusion([1, 2, 3], []))
