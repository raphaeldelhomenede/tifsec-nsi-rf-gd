def verifie(tab):
    tab1 = []
    for i in range(len(tab)-1):
        if tab[i] <= tab[i+1]:
            tab1.append(True)
        else:
            tab1.append(False)
    if False in tab1:
        return False
    else:
        return True

print(verifie([0, 5, 8, 8, 9]))
print(verifie([8, 12, 4]))
print(verifie([-1, 4]))
print(verifie([]))
print(verifie([5]))
