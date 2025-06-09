def binaire(a):
    '''convertit un nombre entier a en sa representation 
    binaire sous forme de chaine de caractères.'''
    if a == 0:
        return '0'
    bin_a = ""
    while a != 0:
        bin_a = f"{a % 2}" + bin_a
        a = a // 2
    return bin_a

print(binaire(0))
print(binaire(77))
