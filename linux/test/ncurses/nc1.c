#include <ncurses.h>

int main(void) {
	int ch;
	initscr();
	raw();
	keypad(stdscr, TRUE);
	noecho();
	printw("Type and Character to see it in bold\n");
	ch = getch();
	
	if (ch == KEY_F(1)) {
		printw("F1 Key Pressed");
	} else {
		printw("The pressed key is ");
		attron(A_BOLD);
		printw("%c", ch);
		attroff(A_BOLD);
	}
	
	refresh();
	getch();
	endwin();

	return 0;
}
