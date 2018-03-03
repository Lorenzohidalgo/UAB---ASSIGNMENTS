-- 02/03/2018
-- ProblemesIHS_VHDL_1718.pdf
-- Exercici 5
-- Lorenzo Hidalgo Gadea, 1395058

library IEEE;
use IEEE.STD_LOGIC_1164.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;
use IEEE.NUMERIC_STD.ALL;

--------------------------------------------------
-- 	ALU 8 BITS VHDL	- TestBench		--
--------------------------------------------------

ENTITY testbench is
end testbench;

architecture Behavioral of testbench is

	COMPONENT ALU
	PORT(
		A,B: in STD_LOGIC_VECTOR(7 downto 0);
		S,D: in STD_LOGIC_VECTOR(3 downto 0);
		ALU_Out: out STD_LOGIC_VECTOR(7 downto 0);
		Carryout: out STD_LOGIC
	);
	end COMPONENT;

	-- INPUTS
	signal A: STD_LOGIC_VECTOR(7 downto 0) := (others => '0');
	signal B: STD_LOGIC_VECTOR(7 downto 0) := (others => '0');
	signal S: STD_LOGIC_VECTOR(3 downto 0) := (others => '0');
	signal D: STD_LOGIC_VECTOR(3 downto 0) := (others => '0');

	-- OUTPUTS
	signal ALU_Out: STD_LOGIC_VECTOR(7 downto 0);
	signal Carryout: STD_LOGIC;

	-- VAR
	signal counter:integer;

begin
	
	ut: ALU PORT MAP(
		A => A,
		B => B,
		S => S,
		D => D,
		ALU_OUT => ALU_Out,
		Carryout => Carryout
	);

	tb:process
	begin

	A <= x"01";
	B <= x"01";
	S <= x"0";
	D <= x"0";
	
	wait for 100 ns;

	for counter in 0 to 7 loop
		S <= S + x"1";
		wait for 100 ns;
	end loop;

	A <= x"01";
	wait for 100 ns;

	for counter in 0 to 7 loop
		D <= D + x"1";
		wait for 100 ns;
	end loop;

	A <= x"FF";
	B <= x"01";
	S <= x"1";
	D <= x"0";
	wait for 100 ns;

	A <= x"00";
	B <= x"00";
	S <= x"0";
	wait for 100 ns;

	wait;
	end process;

end;
