def liste_puissances(a, n):
    result = 1
    tab = []
    for _ in range(n):
        result *= a
        tab.append(result)
    return tab

def liste_puissances_borne(a, n):
    if a >= 2:
        result = 1
        tab = []
        while result * a < n:
            result *= a
            tab.append(result)

        return tab

print(liste_puissances(3, 5))
print(liste_puissances_borne(2, 16))