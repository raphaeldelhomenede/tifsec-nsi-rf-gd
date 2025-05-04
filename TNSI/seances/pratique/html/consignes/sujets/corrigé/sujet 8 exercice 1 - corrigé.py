def recherche(tab, n):
    count = -1
    for i in tab:
        count += 1
        if i == n:
            return count

class console:
    def log(*args):
        print(*args)

console.log(recherche([2, 3, 4, 5, 6], 5))
console.log(recherche([2, 3, 4, 6, 7], 5))