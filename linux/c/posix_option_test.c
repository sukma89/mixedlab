#include <stdio.h>
#include <unistd.h>

int main(void)
{
#ifdef _XOPEN_VERSION
    printf("_XOPEN_VERSION = %d\n", _XOPEN_VERSION);
    printf("sysconf(_SC_XOPEN_VERSION) = %ld\n", sysconf(_SC_XOPEN_VERSION));
    printf("sysconf(_SC_VERSION) = %ld\n", sysconf(_SC_VERSION));
#else
    printf("_XOPEN_VERSION does not supported.\n");
#endif

#ifdef _POSIX_JOB_CONTROL
    printf("_POSIX_JOB_CONTROL = %d\n", _POSIX_JOB_CONTROL);
#else
    printf("_POSIX_JOB_CONTROL does not supported.\n");
#endif

#ifdef _XOPEN_CRYPT
    printf("_XOPEN_CRYPT = %d\n", _XOPEN_CRYPT);
#else
    printf("_XOPEN_CRYPT does not supported.\n");
#endif

#ifdef _XOPEN_REALTIME 
    printf("_XOPEN_REALTIME = %d\n", _XOPEN_REALTIME );
#else
    printf("_XOPEN_REALTIME does not supported.\n");
#endif

#ifdef _XOPEN_LEGACY
    printf("_XOPEN_LEGACY = %d\n", _XOPEN_LEGACY);
#else
    printf("_XOPEN_LEGACY does not supported.\n");
#endif
    return 0;
}
