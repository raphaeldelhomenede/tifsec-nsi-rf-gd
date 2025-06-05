def ecriture_binaire_entier_positif(n):
    if type(n) is not int:
        print("Ceci n'est pas un entier!")
    elif n < 0:
        print("Il doit être positif!")

    if n == 0:
        return "0"

    puissance_2 = 1
    tab = []
    while puissance_2 <= n:
        tab.append(puissance_2)
        puissance_2 *= 2

    var = ""
    for i in tab[::-1]:
        if n >= i:
            var += "1"
            n -= i
        else:
            var += "0"

    return var

print(ecriture_binaire_entier_positif(0))