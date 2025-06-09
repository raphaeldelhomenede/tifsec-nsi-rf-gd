def moyenne(tab):
    notes_total = 0
    coef_total = 0
    for i in tab:
        notes_total += i[0] * i[1]
        coef_total += i[1]
    if tab == [] or coef_total == 0:
        return None
    return notes_total / coef_total

print(moyenne([(8, 2), (12, 0), (13.5, 1), (5, 0.5)]))
print(moyenne([(3, 0), (5, 0)]))
