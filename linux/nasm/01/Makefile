
default:
	nasm -f elf64 hello64.asm -o hello64.o
	ld -s -o hello64 hello64.o
	./hello64

run32:
	nasm -f elf64 hello.asm -o hello.o
	ld -s -o hello hello.o
	./hello

clean:
	rm hello64 
	rm hello 
	rm *.o
