from collections import Counter

with open("text3.txt", "r", encoding="utf-8") as f:
    text = f.read()

letters = [c for c in text.lower() if c.isalpha()]
counts = Counter(letters)
sorted_counts = sorted(counts.items(), key=lambda x: x[1])
median = sorted_counts[(len(sorted_counts) - 1) // 2]
print(median)
