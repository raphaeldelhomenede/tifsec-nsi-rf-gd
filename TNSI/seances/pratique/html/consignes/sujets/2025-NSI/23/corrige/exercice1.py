def effectif_notes(notes_eval):
    tab = [0]*11
    for note in notes_eval:
        tab[note] += 1
    return tab

def notes_triees(tab):
    tab1 = []
    tab_copy = tab.copy()
    while tab_copy:
        m = max(tab_copy)
        tab1.append(m)
        tab_copy.remove(m)
    return tab1[::-1]

notes_eval = [2, 0, 5, 9, 6, 9, 10, 5, 7,
9, 9, 5, 0, 9, 6, 5, 4]
eff = effectif_notes(notes_eval)
print(eff)
print(notes_triees(notes_eval))
