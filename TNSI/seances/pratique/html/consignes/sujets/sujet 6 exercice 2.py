""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet6Exercice2 """

alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'

def position_alphabet(lettre):
    """Renvoie la position de la lettre dans l'alphabet"""
    return ord(lettre) - ord("A")

def cesar(message, decalage):
    """Renvoie le message codé par la méthode de césar
    pour le décalage donné"""
    resultat = ""
    for ... in message:
        if "A" <= c and c <= "Z":
            indice = (...) % 26
            resultat = resultat + alphabet[indice]
        else:
            resultat = ...
    return resultat