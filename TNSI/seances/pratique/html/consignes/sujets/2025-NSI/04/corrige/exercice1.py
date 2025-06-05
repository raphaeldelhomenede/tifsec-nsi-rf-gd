def ecriture_binaire_entier_positif(n):
    if n == 0:
        return "0"

    puissance_2 = 1
    tab = []
    while puissance_2 <= n:
        tab.append(puissance_2)
        puissance_2 *= 2

    var = ""
    for i in tab[::-1]:
        if i <= n:
            var += "1"
            n -= i
        else:
            var += "0"

    return var

print(ecriture_binaire_entier_positif(0))
print(ecriture_binaire_entier_positif(2))
print(ecriture_binaire_entier_positif(105))
