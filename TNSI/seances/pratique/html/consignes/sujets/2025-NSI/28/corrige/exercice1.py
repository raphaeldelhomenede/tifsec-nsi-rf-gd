def a_doublon(tab):
    tab1 = []
    for i in range(len(tab) - 1):
        if tab[i] == tab[i+1]:
            tab1.append(True)
        else:
            tab1.append(False)
    if True in tab1:
        return True
    else:
        return False

print(a_doublon([]))
print(a_doublon([1]))
print(a_doublon([1, 2, 4, 6, 6]))
print(a_doublon([2, 5, 7, 7, 7, 9]))
print(a_doublon([0, 2, 3]))
