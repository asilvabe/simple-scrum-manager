CREATE
OR REPLACE VIEW developer_team_view
AS
SELECT developers.level AS developer_level,
       developers.name  AS developer_name,
       developers.email AS developer_email,
       teams.name       AS team_name,
       developer_team.developer_id,
       developer_team.team_id,
       developer_team.sprints_count,
       developer_team.sp_assigned,
       developer_team.sp_consumed
from developer_team
         inner join developers ON developers.id = developer_team.developer_id
         inner join teams ON teams.id = developer_team.team_id
