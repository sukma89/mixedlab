#include <stdio.h>
#include <string.h>

typedef struct {
	unsigned int id;
	char name[20];
} User;

User update_user(User u) {
	char *name = "Peter Jia";
	u.id = 911;
	//strcpy(u.name, name);
	memcpy(u.name, name, strlen(name) + 1);
	return u;
}

int main(void) 
{
	User u = {119, "James Tang(ABCDEF)"}, u2;
	printf("ID:%d, %s\n", u.id, u.name);
	u2 = update_user(u);
	printf("ID:%d, %s\n", u.id, u.name);
	printf("ID:%d, %s\n", u2.id, u2.name);
	printf("11 > %s\n", u2.name + 10);
		
	return 0;
}
