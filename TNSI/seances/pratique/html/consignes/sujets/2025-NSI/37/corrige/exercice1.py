def gb_vers_entier(tab):
    nombre = 0
    for i in range(len(tab)):
        if tab[i]:
            nombre += 2**(len(tab)-1-i)
    return nombre

print(gb_vers_entier([]))
print(gb_vers_entier([True]))
print(gb_vers_entier([True, False, True, False, False, True, True]))
print(gb_vers_entier([True, False, False, False, False, False, True, False]))
