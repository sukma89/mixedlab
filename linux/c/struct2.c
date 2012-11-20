#include <stdio.h>
#include <string.h>
#include <stdlib.h>

typedef struct {
	int id;
	char name[];
} User;

int main(int argc, char *argv[]) {

	//error: non-static initialization of a flexible array member
	//User u = {1, "James Tang"};
	
	User *u;
	char *name = "James Tang";
	int len = strlen(name);

	printf("Lenght of \"%s\": %d\n", name, len);

	u = malloc(sizeof(User) + sizeof(char) * len);
	u->id = 1;
	strcpy(u->name, name);
	printf("User: %d, %s\n", u->id, u->name);
	free(u);
	return 0;
}
