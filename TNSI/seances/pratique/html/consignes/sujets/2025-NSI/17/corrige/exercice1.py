class Noeud:
    def __init__(self, etiquette, gauche, droit):
        self.v = etiquette
        self.gauche = gauche
        self.droit = droit

def hauteur(a):
    if a is None:
        return -1
    return 1 + max(hauteur(a.gauche), hauteur(a.droit))

def taille(a):
    if a is None:
        return 0
    return 1 + taille(a.gauche) + taille(a.droit)

a = Noeud(1, Noeud(4, None, None),
Noeud(0, None,
Noeud(7, None, None)))

print(hauteur(a))
print(taille(a))

print(hauteur(None))
print(taille(None))

print(hauteur(Noeud(1, None, None)))
print(taille(Noeud(1, None, None)))
