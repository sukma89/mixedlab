#ifndef _SHOW_BYTES_H
#define _SHOW_BYTES_H 1

typedef unsigned char *byte_p;
void show_bytes(byte_p start, long int len);
void show_int(int x);
void show_float(float x);
void show_pointer(void *x);

#endif
