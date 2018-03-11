-- 11/03/2018
-- ProblemesIHS_VHDL_1718.pdf
-- Exercici 7 a
-- Lorenzo Hidalgo Gadea, 1395058

library IEEE;
use IEEE.STD_LOGIC_1164.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;
use IEEE.NUMERIC_STD.ALL;

ENTITY NoOutFSM is
	PORT( clock: IN STD_LOGIC;
		P: IN STD_LOGIC;
		reset: IN STD_LOGIC);
END NoOutFSM;

architecture Behavior of NoOutFSM is

TYPE state_type IS (s0, s1, s2, s3);
	signal State: state_type;

BEGIN
	PROCESS(clock, reset)
	BEGIN

		if (reset = '1') then
			State <= s0;

		elsif rising_edge(clock) then
			case State is
				when s0 =>
					if (P = '1') then
						State <= s1;	
					end if;

				when s1 =>
					if (P = '1') then
						State <= s2;
					end if;

				when s2 =>
					if (P = '1') then
						State <= s3;
					else
						State <= s0;
					end if;

				when s3 =>
					State <= s1;

				when others =>
					State <= s0;

			end case;

		end if;

	end PROCESS;

end Behavior;