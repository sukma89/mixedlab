#include <jni.h>
#include <stdio.h>
#include "HelloWorld.h"

JNIEXPORT void JNICALL 
Java_HelloWorld_print(JNIEnv *env, jobject obj)
{
    printf("Hello World!\n");
    return;
}

JNIEXPORT jstring JNICALL Java_HelloWorld_getString
  (JNIEnv *env, jobject obj) {
	char str[128];
	scanf("%s", str);
	return (*env)->NewStringUTF(env, str);
}
