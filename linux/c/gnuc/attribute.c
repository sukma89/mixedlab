#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "attribute.h"

int main(int argc, char *argv[]) {
	User u = {1, "James Tang"};
	User2 *u2;

	//warning: assignment from incompatible pointer type
	//u2 = &u;
	
	u2 = malloc(sizeof(User2));
	u2->id = 2;
	strcpy(u2->name, "Peter Chen");
	printf("Sizeof int=%ld, char=%ld, User=%ld, User2=%ld\n", 
			sizeof(int), sizeof(char), sizeof(User), sizeof(User2));
	printf("User: %d, %s\n", u.id, u.name);
	printf("User: %d, %s\n", u2->id, u2->name);
	return 0;
}
