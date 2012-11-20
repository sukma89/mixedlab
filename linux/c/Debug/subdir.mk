################################################################################
# Automatically-generated file. Do not edit!
################################################################################

# Add inputs and outputs from these tool invocations to the build variables 
C_SRCS += \
../CaseConversion.c \
../bitwise.c \
../endian.c \
../endian2.c \
../endianness.c \
../fork.c \
../isort.c \
../macro.c \
../macro_do_while.c \
../number_sign.c \
../pointer.c \
../producer_consumer_1.c \
../show_bytes.c \
../sizeof.c \
../string.c \
../struct.c \
../struct2.c \
../struct_function_member.c \
../types.c 

OBJS += \
./CaseConversion.o \
./bitwise.o \
./endian.o \
./endian2.o \
./endianness.o \
./fork.o \
./isort.o \
./macro.o \
./macro_do_while.o \
./number_sign.o \
./pointer.o \
./producer_consumer_1.o \
./show_bytes.o \
./sizeof.o \
./string.o \
./struct.o \
./struct2.o \
./struct_function_member.o \
./types.o 

C_DEPS += \
./CaseConversion.d \
./bitwise.d \
./endian.d \
./endian2.d \
./endianness.d \
./fork.d \
./isort.d \
./macro.d \
./macro_do_while.d \
./number_sign.d \
./pointer.d \
./producer_consumer_1.d \
./show_bytes.d \
./sizeof.d \
./string.d \
./struct.d \
./struct2.d \
./struct_function_member.d \
./types.d 


# Each subdirectory must supply rules for building sources it contributes
%.o: ../%.c
	@echo 'Building file: $<'
	@echo 'Invoking: GCC C Compiler'
	gcc -O0 -g3 -Wall -c -fmessage-length=0 -MMD -MP -MF"$(@:%.o=%.d)" -MT"$(@:%.o=%.d)" -o "$@" "$<"
	@echo 'Finished building: $<'
	@echo ' '


