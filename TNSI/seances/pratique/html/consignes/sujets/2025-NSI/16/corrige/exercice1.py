def moyenne(notes):
    total_notes = 0
    total_coef = 0
    for i in notes:
        total_notes += i[0] * i[1]
        total_coef += i[1]
    return total_notes / total_coef

print(moyenne([(15.0,2),(9.0,1),(12.0,3)]))
