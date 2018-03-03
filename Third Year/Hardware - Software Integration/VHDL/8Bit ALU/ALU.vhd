-- 02/03/2018
-- ProblemesIHS_VHDL_1718.pdf
-- Exercici 5
-- Lorenzo Hidalgo Gadea, 1395058

library IEEE;
use IEEE.STD_LOGIC_1164.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;
use IEEE.NUMERIC_STD.ALL;

--------------------------------------------------
-- 		ALU 8 BITS VHDL			--
--------------------------------------------------
-- OPERATIONS:  Addition, Substraction, AND,	-- 
--		OR, NAND, NOR, Complement 1 & 2	--
--						--
-- EXTRA:	Logical Left shift and Carry	--
--------------------------------------------------
-- INPUTS:	A,B (8 Bits); S, D (4 Bits);	--
--						--
-- OUTPUTS:	ALU_Out (8 Bits);		--
--		Carry (1 Bit);			--
--------------------------------------------------

entity ALU is
	Port(
		A, B: in STD_LOGIC_VECTOR(7 downto 0);
		S, D: in STD_LOGIC_VECTOR(3 downto 0);
		ALU_Out: out STD_LOGIC_VECTOR(7 downto 0);
		Carryout: out STD_LOGIC
	);
end ALU;

architecture Behavioral of ALU is

signal ALU_Result: STD_LOGIC_VECTOR(7 downto 0);
signal tmp: STD_LOGIC_VECTOR(8 downto 0);

begin
	process(A,B,S,D)
	begin
	case(S) is
		when "0000" => -- Addition
			ALU_Result <= A + B;
		when "0001" => -- Substraction
			ALU_Result <= A - B;
		when "0010" => -- AND
			ALU_Result <= A and B;
		when "0011" => -- OR
			ALU_Result <= A or B;
		when "0100" => -- NAND
			ALU_Result <= A nand B;
		when "0101" => -- NOR
			ALU_Result <= A nor B;
		when "0110" => -- Complement a 1
			ALU_Result <= (A xor "11111111");
		when "0111" => -- Complement a 2
			ALU_Result <= (A xor "11111111") + 1;
		when "1000" => -- Logical Left shift
			if (to_integer(unsigned(D)) > 8) then
				ALU_Result <= A;
			else
				ALU_Result <= STD_LOGIC_VECTOR(unsigned(A) sll to_integer(unsigned(D)));
			end if;
		when others => -- NON VALID OP NUMBER
			ALU_Result <= A;
	end case;

	end process;
ALU_Out <= ALU_Result;
tmp <= ('0' & A) + ('0' & B);
Carryout <= tmp(8);

end Behavioral;

