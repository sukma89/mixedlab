################################################################################
# Automatically-generated file. Do not edit!
################################################################################

# Add inputs and outputs from these tool invocations to the build variables 
C_SRCS += \
../variable/02/lib.c \
../variable/02/main.c 

OBJS += \
./variable/02/lib.o \
./variable/02/main.o 

C_DEPS += \
./variable/02/lib.d \
./variable/02/main.d 


# Each subdirectory must supply rules for building sources it contributes
variable/02/%.o: ../variable/02/%.c
	@echo 'Building file: $<'
	@echo 'Invoking: GCC C Compiler'
	gcc -O0 -g3 -Wall -c -fmessage-length=0 -MMD -MP -MF"$(@:%.o=%.d)" -MT"$(@:%.o=%.d)" -o "$@" "$<"
	@echo 'Finished building: $<'
	@echo ' '


