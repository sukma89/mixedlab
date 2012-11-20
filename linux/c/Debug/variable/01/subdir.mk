################################################################################
# Automatically-generated file. Do not edit!
################################################################################

# Add inputs and outputs from these tool invocations to the build variables 
C_SRCS += \
../variable/01/lib.c \
../variable/01/main.c 

OBJS += \
./variable/01/lib.o \
./variable/01/main.o 

C_DEPS += \
./variable/01/lib.d \
./variable/01/main.d 


# Each subdirectory must supply rules for building sources it contributes
variable/01/%.o: ../variable/01/%.c
	@echo 'Building file: $<'
	@echo 'Invoking: GCC C Compiler'
	gcc -O0 -g3 -Wall -c -fmessage-length=0 -MMD -MP -MF"$(@:%.o=%.d)" -MT"$(@:%.o=%.d)" -o "$@" "$<"
	@echo 'Finished building: $<'
	@echo ' '


