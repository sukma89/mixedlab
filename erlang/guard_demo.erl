-module(guard_demo).
-export([even/1, number/1, young/1]).

even(Int) when Int rem 2 == 0 -> true;
even(Int) when Int rem 2 /= 1 -> false.

number(Num) when is_integer(Num) -> integer;
number(Num) when is_float(Num)   -> float;
number(_Other)                   -> false.

young(Age) when Age >= 10, Age =< 30 -> young;
young(Age) when Age <  10            -> infantile;
young(_other)                        -> mature.

