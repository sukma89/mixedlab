#include "list.h"

static Node list_sum(Node num1, Node num2) {
	Node sum, pos;
	int tmp, carry = 0;
	sum = NULL;
	while (num1 != NULL || num2 != NULL || carry > 0) {
		tmp = carry;
		carry = 0;
		if (num1 != NULL) {
			tmp += num1->e;
			num1 = num1->next;
		}
		if (num2 != NULL) {
			tmp += num2->e;
			num2 = num2->next;
		}
		if (tmp >= 10) {
			carry = 1;
			tmp = tmp % 10;
		}

		if (sum == NULL) {
			sum = init_list();
			sum->e = tmp;
			pos = sum;
		} else {
			pos = insert(pos, tmp);	
		}
	}
	return sum;
}

int main(void) {
	Node num1, num2, sum, pos;
	num1 = init_list();
	num2 = init_list();

	num1->e = 3;
	pos = num1;
	pos = insert(pos, 1);
	pos = insert(pos, 2);

	num2->e = 7;
	pos = num2;
	pos = insert(pos, 9);
	pos = insert(pos, 7);

	print_r(num1);
	print_r(num2);

	sum = list_sum(num1, num2);
	print_r(sum);
	return 0;
}
