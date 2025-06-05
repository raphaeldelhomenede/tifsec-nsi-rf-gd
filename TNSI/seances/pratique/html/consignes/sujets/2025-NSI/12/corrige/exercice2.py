romains = {"I":1, "V":5, "X":10, "L":50, "C":100, "D":500, "M":1000}
def traduire_romain(nombre):
    """ Renvoie l'écriture décimale du nombre donné en chiffres
    romains """
    if len(nombre) == 1:
        return romains[nombre[0]]
    elif romains[nombre[0]] >= romains[nombre[1]]:
        return romains[nombre[0]] + traduire_romain(nombre[1:])
    else:
        return -romains[nombre[0]] + traduire_romain(nombre[1:])

print(traduire_romain("VII"))
print(traduire_romain("XIV"))
print(traduire_romain("CXLII"))
print(traduire_romain("MMXXIV"))
print(traduire_romain("MMXXV"))
