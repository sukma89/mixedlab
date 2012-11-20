################################################################################
# Automatically-generated file. Do not edit!
################################################################################

# Add inputs and outputs from these tool invocations to the build variables 
C_SRCS += \
../gnuc/attribute.c \
../gnuc/main.c \
../gnuc/th.c 

OBJS += \
./gnuc/attribute.o \
./gnuc/main.o \
./gnuc/th.o 

C_DEPS += \
./gnuc/attribute.d \
./gnuc/main.d \
./gnuc/th.d 


# Each subdirectory must supply rules for building sources it contributes
gnuc/%.o: ../gnuc/%.c
	@echo 'Building file: $<'
	@echo 'Invoking: GCC C Compiler'
	gcc -O0 -g3 -Wall -c -fmessage-length=0 -MMD -MP -MF"$(@:%.o=%.d)" -MT"$(@:%.o=%.d)" -o "$@" "$<"
	@echo 'Finished building: $<'
	@echo ' '


