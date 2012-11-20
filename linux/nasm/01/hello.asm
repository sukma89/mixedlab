; 32-bit "Hello, world" in Linux NASM

global _start           ; must bu declared for linker(ld)

section .text
_start:
    mov     edx, length
    mov     ecx, message
    mov     ebx, 1          ; file discriptor (stdout)
    mov     eax, 4          ; system call number (sys_write)
    int     0x80            ; call kernel

    mov     eax, 1          ; system call number (sys_exit)
    int     0x80            ; call kernel

section .data
message: db     'Hello, world!', 0xa
length:  equ    $-message               ;length of the string
