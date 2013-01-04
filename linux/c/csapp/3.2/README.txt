gcc -O1 -S [-masm=intel] code.c
gcc -m32 -O1 -c code.c
objdump -d code.o
gcc -m32 -O1 -o prog code.o main.c

