	.file	"exchange.c"
	.text
.globl exchange
	.type	exchange, @function
exchange:
	pushl	%ebp
	movl	%esp, %ebp
	movl	8(%ebp), %edx
	movl	(%edx), %eax
	movl	12(%ebp), %ecx
	movl	%ecx, (%edx)
	popl	%ebp
	ret
	.size	exchange, .-exchange
	.ident	"GCC: (GNU) 4.4.6 20120305 (Red Hat 4.4.6-4)"
	.section	.note.GNU-stack,"",@progbits
