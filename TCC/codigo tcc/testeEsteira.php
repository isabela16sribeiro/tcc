<?php
#include <AFMotor.h>
AF_DCMotor motor(4);
int sensor_saida, sensor_entrada,i;
 int receptor1 = 10;                                            //pino 5 da placa arduino
 int receptor2 = 9;                                             //pino 7 da placa arduino
 int Estadoreceptor1 = 1;                                9 //estado inicial do sensor de entrada
 int Estadoreceptor2 = 1;                                //estado inicial do sensor de saída

void setup() {
Serial.begin(9600);     Serial.println("Motor test!");
motor.setSpeed(200);
motor.run(RELEASE);
 pinMode (receptor1, INPUT);                                                  //entrada
 pinMode (receptor2, INPUT);                                                  //entrada   
}
void loop() {
 Estadoreceptor1 = digitalRead(receptor1);                //leitura digital do sensor entrada
 Estadoreceptor2 = digitalRead(receptor2);               //leitura digital do sensor saida
if (Estadoreceptor1 == HIGH)sensor_entrada=1;
else sensor_entrada=0;
if (Estadoreceptor2 == HIGH)sensor_saida=1;
else sensor_saida=0;

if(sensor_entrada==1)
{
 motor.run(FORWARD);                                                // Sentido do motor.
 for (i=0; i<255; i++)                                                    //Acelera o motor
{
motor.setSpeed(i); 
delay(10);
}
 delay(7000);                                                         // Delay para desacelerar o motor
 for (i=255; i>150; i--)                                            //desaceleração do motor
{
motor.setSpeed(i); 
delay(10);
}
sensor_entrada=0;
 } // fim do if(sensor_entrada)
 if(sensor_saida==1)                                                         //desliga motor
{
i=0;
motor.setSpeed(i);
sensor_saida=0;
}
delay(1000);
}
