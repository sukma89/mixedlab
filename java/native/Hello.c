#include <jni.h>
#include "Hello.h"
#include <stdio.h>

JNIEXPORT jint JNICALL Java_Hello_getNumber
  (JNIEnv *env, jobject obj) {
	  return 10;
  }
