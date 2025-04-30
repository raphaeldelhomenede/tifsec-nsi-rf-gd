""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet3Exercice2 """
def eleves_du_mois(eleves, notes):
    note_maxi = 0
    meilleurs_eleves = ...
    for i in range(...):
        if notes[i] == ...:
            meilleurs_eleves.append(...)
        elif notes[i] > note_maxi:
            note_maxi = ...
            meilleurs_eleves = [...]

    return note_maxi, meilleurs_eleves